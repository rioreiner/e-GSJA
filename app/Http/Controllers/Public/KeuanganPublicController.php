<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;

class KeuanganPublicController extends Controller
{
    public function index()
    {
        $keuangan = Keuangan::latest()->paginate(10);

        $totalPemasukan = Keuangan::where('jenis', 'pemasukan')->sum('jumlah');

        $totalPengeluaran = Keuangan::where('jenis', 'pengeluaran')->sum('jumlah');

        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('public.keuangan.index', compact(
            'keuangan',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo'
        ));
    }
}