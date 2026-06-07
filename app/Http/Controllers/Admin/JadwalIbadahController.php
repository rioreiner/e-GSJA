<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalIbadah\StoreJadwalIbadahRequest;
use App\Http\Requests\JadwalIbadah\UpdateJadwalIbadahRequest;
use App\Models\JadwalIbadah;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalIbadahController extends Controller
{
    public function index(Request $request): View
    {
        $query = JadwalIbadah::with('pelayanan');

        if ($search = $request->get('search')) {
            $query->search($search);
        }

        if ($request->get('filter') === 'upcoming') {
            $query->upcoming();
        } else {
            $query->orderByDesc('tanggal');
        }

        $jadwal = $query->paginate(15)->withQueryString();

        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create(): View
    {
        return view('admin.jadwal.create');
    }

    public function store(StoreJadwalIbadahRequest $request): RedirectResponse
    {
        JadwalIbadah::create($request->validated());

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal ibadah berhasil ditambahkan.');
    }

    public function show(JadwalIbadah $jadwal): View
    {
        $jadwal->load('pelayanan');
        $pelayananByJenis = $jadwal->pelayanan->groupBy('jenis_pelayanan');

        return view('admin.jadwal.show', compact('jadwal', 'pelayananByJenis'));
    }

    public function edit(JadwalIbadah $jadwal): View
    {
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
{
    $jadwal = JadwalIbadah::findOrFail($id);

    $request->validate([
        'nama_kegiatan' => 'required',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required',
        'pendeta' => 'nullable',
        'tema' => 'nullable',
    ]);

    $jadwal->nama_kegiatan = $request->nama_kegiatan;
    $jadwal->tanggal = $request->tanggal;
    $jadwal->waktu = $request->waktu;
    $jadwal->lokasi = $request->lokasi;
    $jadwal->pendeta = $request->pendeta;
    $jadwal->tema = $request->tema;

    $jadwal->save();

    return redirect()
        ->route('admin.jadwal.index')
        ->with('success', 'Jadwal berhasil diupdate');
}

    public function destroy(JadwalIbadah $jadwal): RedirectResponse
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal ibadah berhasil dihapus.');
    }
}