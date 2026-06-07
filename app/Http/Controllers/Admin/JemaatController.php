<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jemaat\StoreJemaatRequest;
use App\Http\Requests\Jemaat\UpdateJemaatRequest;
use App\Models\Jemaat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Exports\JemaatExport;

class JemaatController extends Controller
{
    public function index(Request $request): View
    {
        $query = Jemaat::query();

        if ($search = $request->get('search')) {
            $query->search($search);
        }

        $query->filter($request->only(['status_keanggotaan', 'jenis_kelamin', 'status_pernikahan']));

        $jemaat = $query->latest()->paginate(15)->withQueryString();

        $stats = [
            'aktif'      => Jemaat::where('status_keanggotaan', 'Aktif')->count(),
            'tidak_aktif'=> Jemaat::where('status_keanggotaan', 'Tidak Aktif')->count(),
            'total'      => Jemaat::count(),
        ];

        return view('admin.jemaat.index', compact('jemaat', 'stats'));
    }

    public function create(): View
    {
        $nomorAnggota = Jemaat::generateNomorAnggota();
        return view('admin.jemaat.create', compact('nomorAnggota'));
    }

    public function store(StoreJemaatRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['nomor_anggota'] = Jemaat::generateNomorAnggota();

        // UPLOAD FOTO LANGSUNG KE FOLDER PUBLIC
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Pindah langsung ke public/uploads/jemaat
            $file->move(public_path('uploads/jemaat'), $filename);

            $data['foto'] = $filename;
        }

        Jemaat::create($data);

        return redirect()
            ->route('admin.jemaat.index')
            ->with('success', 'Data jemaat berhasil ditambahkan.');
    }

    public function show(Jemaat $jemaat): View
    {
        return view('admin.jemaat.show', compact('jemaat'));
    }

    public function edit(Jemaat $jemaat): View
    {
        return view('admin.jemaat.edit', compact('jemaat'));
    }

    public function update(UpdateJemaatRequest $request, Jemaat $jemaat): RedirectResponse
    {
        $data = $request->validated();

        // UPLOAD FOTO BARU LANGSUNG KE FOLDER PUBLIC
        if ($request->hasFile('foto')) {
            
            // Hapus foto lama di folder public jika ada
            if ($jemaat->foto && file_exists(public_path('uploads/jemaat/' . $jemaat->foto))) {
                unlink(public_path('uploads/jemaat/' . $jemaat->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Simpan ke public/uploads/jemaat
            $file->move(public_path('uploads/jemaat'), $filename);

            $data['foto'] = $filename;
        }

        $jemaat->update($data);

        return redirect()
            ->route('admin.jemaat.index')
            ->with('success', 'Data jemaat berhasil diperbarui.');
    }

    public function destroy(Jemaat $jemaat): RedirectResponse
    {
        $jemaat->delete();
        return redirect()->route('admin.jemaat.index')
            ->with('success', 'Data jemaat berhasil dihapus.');
    }

    public function restore(int $id): RedirectResponse
    {
        $jemaat = Jemaat::withTrashed()->findOrFail($id);
        $jemaat->restore();
        return redirect()->route('admin.jemaat.index')
            ->with('success', 'Data jemaat berhasil dipulihkan.');
    }

    public function forceDelete(int $id): RedirectResponse
    {
        $jemaat = Jemaat::withTrashed()->findOrFail($id);

        // Hapus file fisik di folder public saat hapus permanen
        if ($jemaat->foto && file_exists(public_path('uploads/jemaat/' . $jemaat->foto))) {
            unlink(public_path('uploads/jemaat/' . $jemaat->foto));
        }

        $jemaat->forceDelete();
        return redirect()->route('admin.jemaat.index')
            ->with('success', 'Data jemaat berhasil dihapus permanen.');
    }

    public function exportPdf(): mixed
    {
        $jemaat = Jemaat::orderBy('nama_lengkap')->get();
        $pdf    = Pdf::loadView('admin.jemaat.pdf', compact('jemaat'))
                     ->setPaper('a4', 'landscape');
        return $pdf->download('data-jemaat-' . now()->format('Y-m-d') . '.pdf');
    }

    public function exportExcel()
    {
    }

    public function trash(): View
    {
        $jemaat = Jemaat::onlyTrashed()->latest()->paginate(15);
        return view('admin.jemaat.trash', compact('jemaat'));
    }
}