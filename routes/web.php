<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| AUTH CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BendaharaDashboardController;

use App\Http\Controllers\Admin\JemaatController;
use App\Http\Controllers\Admin\JadwalIbadahController;
use App\Http\Controllers\Admin\PelayananController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GaleriController;

/*
|--------------------------------------------------------------------------
| PUBLIC CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\EventPublicController;
use App\Http\Controllers\Public\JadwalPublicController;
use App\Http\Controllers\Public\KeuanganPublicController;



/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
| Bisa diakses tanpa login
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/

Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita.index');

Route::get('/berita/{slug}', [BeritaController::class, 'show'])
    ->name('berita.show');

/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/

// Rute untuk Halaman Utama Event
Route::get('/events', [EventPublicController::class, 'index'])->name('events.index');

// Rute untuk Halaman Detail Event (Pastikan parameternya bernama {id} agar cocok dengan Controller)
Route::get('/events/{id}', [EventPublicController::class, 'show'])->name('events.show');


/*
|--------------------------------------------------------------------------
| JADWAL IBADAH
|--------------------------------------------------------------------------
*/

Route::get('/jadwal-ibadah', [JadwalPublicController::class, 'index'])
    ->name('jadwal.index');

Route::get('/jadwal', [JadwalPublicController::class, 'index'])->name('jadwal.index');

Route::get('/jadwal/{id}', [JadwalPublicController::class, 'show'])->name('jadwal.show');

// Tambahkan di routes/web.php (di luar group admin jika ada)
Route::get('/pelayanan/export-pdf', [PelayananController::class, 'exportPdf'])
     ->name('pelayanan.export-pdf');

/*
| KEUANGAN PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/keuangan', [KeuanganPublicController::class, 'index'])
    ->name('keuangan.public');

/*
| GALERI PUBLIC
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create'); // <-- Rute ini yang hilang
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});

/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/galeri',)->name('galeri.index');
    Route::get('/galeri/create',)->name('galeri.create'); // <-- Rute ini yang hilang
    Route::post('/galeri',)->name('galeri.store');
    Route::delete('/galeri/{id}',)->name('galeri.destroy');
});

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | JEMAAT
        |--------------------------------------------------------------------------
        */

        Route::get('/jemaat/trash', [JemaatController::class, 'trash'])
            ->name('jemaat.trash');

        Route::post('/jemaat/{id}/restore', [JemaatController::class, 'restore'])
            ->name('jemaat.restore');

        Route::delete('/jemaat/{id}/force-delete', [JemaatController::class, 'forceDelete'])
            ->name('jemaat.force-delete');

        Route::get('/jemaat/export-pdf', [JemaatController::class, 'exportPdf'])
            ->name('jemaat.export-pdf');

        Route::get('/jemaat/export-excel', [JemaatController::class, 'exportExcel'])
            ->name('jemaat.export-excel');

        Route::resource('/jemaat', JemaatController::class);

        /*
        |--------------------------------------------------------------------------
        | JADWAL IBADAH
        |--------------------------------------------------------------------------
        */

        Route::resource('/jadwal', JadwalIbadahController::class);

        /*
        |--------------------------------------------------------------------------
        | PELAYANAN
        |--------------------------------------------------------------------------
        */

        Route::resource('/pelayanan', PelayananController::class)
            ->except(['show']);

        Route::get('/pelayanan/export-pdf', [PelayananController::class, 'exportPdf'])->name('pelayanan.export-pdf');

        /*
        |--------------------------------------------------------------------------
        | POSTS / BERITA
        |--------------------------------------------------------------------------
        */

        Route::resource('/posts', PostController::class);

        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

        Route::resource('/events', EventController::class);
    });

/*
|--------------------------------------------------------------------------
| KEUANGAN MANAGEMENT
|--------------------------------------------------------------------------
| Admin + Bendahara
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin|bendahara'])
    ->prefix('keuangan-management')
    ->name('admin.keuangan.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD BENDAHARA
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [BendaharaDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        Route::get('/laporan-bulanan', [KeuanganController::class, 'laporanBulanan'])
            ->name('laporan');

        /*
        |--------------------------------------------------------------------------
        | EXPORT
        |--------------------------------------------------------------------------
        */

        Route::get('/export-pdf', [KeuanganController::class, 'exportPdf'])
            ->name('export-pdf');

        /*
        |--------------------------------------------------------------------------
        | CRUD KEUANGAN
        |--------------------------------------------------------------------------
        */

        Route::get('/', [KeuanganController::class, 'index'])
            ->name('index');

        Route::get('/create', [KeuanganController::class, 'create'])
            ->name('create');

        Route::post('/', [KeuanganController::class, 'store'])
            ->name('store');

        Route::get('/{keuangan}/edit', [KeuanganController::class, 'edit'])
            ->name('edit');

        Route::put('/{keuangan}', [KeuanganController::class, 'update'])
            ->name('update');

        Route::delete('/{keuangan}', [KeuanganController::class, 'destroy'])
            ->name('destroy');
    });


/*
|--------------------------------------------------------------------------
| ROUTE BENDAHARA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:bendahara'])
    ->prefix('bendahara')
    ->name('bendahara.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [BendaharaDashboardController::class, 'index'])
            ->name('dashboard');

    });