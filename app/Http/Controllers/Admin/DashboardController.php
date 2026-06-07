<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\Post;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalJemaat      = Jemaat::where('status_keanggotaan', 'Aktif')->count();
        $totalEvent       = Event::count();
        $totalBerita      = Post::count();
        $totalPemasukan   = Keuangan::totalPemasukan();
        $totalPengeluaran = Keuangan::totalPengeluaran();
        $saldo            = $totalPemasukan - $totalPengeluaran;

        // Pemasukan & Pengeluaran 6 bulan terakhir untuk grafik
        $chartData = $this->getChartData();

        // Recent activity
        $recentJemaat    = Jemaat::latest()->take(5)->get();
        $upcomingEvents  = Event::upcoming()->take(5)->get();
        $recentKeuangan  = Keuangan::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalJemaat',
            'totalEvent',
            'totalBerita',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'chartData',
            'recentJemaat',
            'upcomingEvents',
            'recentKeuangan'
        ));
    }

    private function getChartData(): array
    {
        $labels      = [];
        $pemasukan   = [];
        $pengeluaran = [];

        for ($i = 5; $i >= 0; $i--) {
            $date  = now()->subMonths($i);
            $year  = (int) $date->year;
            $month = (int) $date->month;

            $labels[]      = $date->translatedFormat('M Y');
            $pemasukan[]   = Keuangan::totalPemasukan($year, $month);
            $pengeluaran[] = Keuangan::totalPengeluaran($year, $month);
        }

        return compact('labels', 'pemasukan', 'pengeluaran');
    }
}