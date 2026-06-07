<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pelayanan\StorePelayananRequest;
use App\Models\JadwalIbadah;
use App\Models\Pelayanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class PelayananController extends Controller
{
    public function index(Request $request): View
    {
        $query = Pelayanan::with('jadwalIbadah');

        if ($search = $request->get('search')) {
            $query->where('nama_pelayan', 'like', "%{$search}%");
        }

        if ($jenis = $request->get('jenis_pelayanan')) {
            $query->where('jenis_pelayanan', $jenis);
        }

        $pelayanan = $query->latest()->paginate(15)->withQueryString();

        return view('admin.pelayanan.index', compact('pelayanan'));
    }

    public function create(Request $request): View
    {
        $jadwalList = JadwalIbadah::orderByDesc('tanggal')->get();
        $selected   = $request->get('jadwal_ibadah_id');

        return view('admin.pelayanan.create', compact('jadwalList', 'selected'));
    }

    public function store(StorePelayananRequest $request): RedirectResponse
    {
        Pelayanan::create($request->validated());

        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data pelayanan berhasil ditambahkan.');
    }

    public function edit(Pelayanan $pelayanan): View
    {
        $jadwalList = JadwalIbadah::orderByDesc('tanggal')->get();
        return view('admin.pelayanan.edit', compact('pelayanan', 'jadwalList'));
    }

    public function update(StorePelayananRequest $request, Pelayanan $pelayanan): RedirectResponse
    {
        $pelayanan->update($request->validated());

        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data pelayanan berhasil diperbarui.');
    }

    public function destroy(Pelayanan $pelayanan): RedirectResponse
    {
        $pelayanan->delete();
        return redirect()->route('admin.pelayanan.index')
            ->with('success', 'Data pelayanan berhasil dihapus.');
    }
    public function exportPdf(): mixed
{
    // Ambil data yang diperlukan
    $pelayanan = Pelayanan::with('jadwalIbadah')->get();
    
    // Generate PDF
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pelayanan.pdf', compact('pelayanan'))
              ->setPaper('a4', 'portrait');
              
    return $pdf->download('Data-Pelayanan-' . now()->format('Y-m-d') . '.pdf');
}
}