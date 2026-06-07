<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\StoreKeuanganRequest;
use App\Http\Requests\Keuangan\UpdateKeuanganRequest;
use App\Models\Keuangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeuanganExport;

class KeuanganController extends Controller
{
    public function index(Request $request): View
    {
        $query = Keuangan::with('user');

        $year  = (int) $request->get('year', now()->year);
        $month = $request->get('month');

        $query->whereYear('tanggal', $year);

        if ($month) {
            $query->whereMonth('tanggal', $month);
        }

        if ($search = $request->get('search')) {
            $query->search($search);
        }

        if ($jenis = $request->get('jenis')) {
            $query->where('jenis', $jenis);
        }

        $keuangan = $query->orderByDesc('tanggal')->paginate(20)->withQueryString();

        // Summary
        $summaryQuery = Keuangan::whereYear('tanggal', $year);
        if ($month) $summaryQuery->whereMonth('tanggal', $month);

        $totalPemasukan   = (clone $summaryQuery)->where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = (clone $summaryQuery)->where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo            = $totalPemasukan - $totalPengeluaran;

        // Chart data - monthly for selected year
        $chartData = $this->getMonthlyChart($year);

        // Kategori pemasukan & pengeluaran
        $kategoriPemasukan   = (clone $summaryQuery)->where('jenis', 'pemasukan')
                                ->selectRaw('kategori, sum(jumlah) as total')
                                ->groupBy('kategori')
                                ->get();
        $kategoriPengeluaran = (clone $summaryQuery)->where('jenis', 'pengeluaran')
                                ->selectRaw('kategori, sum(jumlah) as total')
                                ->groupBy('kategori')
                                ->get();

        $years = Keuangan::selectRaw('YEAR(tanggal) as year')->distinct()->orderByDesc('year')->pluck('year');

        return view('admin.keuangan.index', compact(
            'keuangan',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'chartData',
            'kategoriPemasukan',
            'kategoriPengeluaran',
            'years',
            'year',
            'month'
        ));
    }

    public function create(): View
    {
        return view('admin.keuangan.create');
    }

    public function store(StoreKeuanganRequest $request): RedirectResponse
    {
        $data            = $request->validated();
        $data['user_id'] = auth()->id();

        Keuangan::create($data);

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil ditambahkan.');
    }

    public function edit(Keuangan $keuangan): View
    {
        return view('admin.keuangan.edit', compact('keuangan'));
    }

    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan): RedirectResponse
    {
        $keuangan->update($request->validated());

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil diperbarui.');
    }

    public function destroy(Keuangan $keuangan): RedirectResponse
    {
        $keuangan->delete();
        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil dihapus.');
    }

    public function laporanBulanan(Request $request): View
    {
        $year  = (int) $request->get('year', now()->year);
        $month = (int) $request->get('month', now()->month);

        $keuangan = Keuangan::with('user')
                            ->byMonth($year, $month)
                            ->orderByDesc('tanggal')
                            ->get();

        $totalPemasukan   = $keuangan->where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = $keuangan->where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo            = $totalPemasukan - $totalPengeluaran;

        $bulanNama = \Carbon\Carbon::create($year, $month, 1)->translatedFormat('F Y');

        return view('admin.keuangan.laporan', compact(
            'keuangan',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo',
            'year',
            'month',
            'bulanNama'
        ));
    }

    public function exportPdf()
{
    $keuangan = Keuangan::latest()->get();

    $totalPemasukan = Keuangan::where('jenis', 'Pemasukan')
        ->sum('jumlah');

    $totalPengeluaran = Keuangan::where('jenis', 'Pengeluaran')
        ->sum('jumlah');

    $pdf = Pdf::loadView(
        'admin.keuangan.pdf',
        compact(
            'keuangan',
            'totalPemasukan',
            'totalPengeluaran'
        )
    )->setPaper('a4', 'landscape');

    return $pdf->download(
        'laporan-keuangan.pdf'
    );
}


    private function getMonthlyChart(int $year): array
    {
        $labels      = [];
        $pemasukan   = [];
        $pengeluaran = [];

        for ($m = 1; $m <= 12; $m++) {
            $labels[]      = \Carbon\Carbon::create($year, $m, 1)->translatedFormat('M');
            $pemasukan[]   = Keuangan::totalPemasukan($year, $m);
            $pengeluaran[] = Keuangan::totalPengeluaran($year, $m);
        }

        return compact('labels', 'pemasukan', 'pengeluaran');
    }
}