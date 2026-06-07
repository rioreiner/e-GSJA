<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\View\View;

class BendaharaDashboardController extends Controller
{
    public function index(): View
    {
        $totalPemasukan   = Keuangan::totalPemasukan();
        $totalPengeluaran = Keuangan::totalPengeluaran();
        $saldo            = $totalPemasukan - $totalPengeluaran;

        $bulanIniPemasukan   = Keuangan::totalPemasukan(now()->year, now()->month);
        $bulanIniPengeluaran = Keuangan::totalPengeluaran(now()->year, now()->month);

        $recentKeuangan = Keuangan::with('user')->latest()->take(10)->get();

        $chartData = $this->getChartData();

        return view('bendahara.dashboard', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'bulanIniPemasukan',
            'bulanIniPengeluaran',
            'recentKeuangan',
            'chartData'
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