<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // 1. Halaman Utama Admin Galeri (Tampilkan semua foto)
    public function index()
    {
        $galeri = Galeri::latest()->paginate(10);

        $totalKategori = Galeri::distinct('kategori')->whereNotNull('kategori')->count('kategori');
        $fotoUtama = Galeri::where('is_utama', true)->count();

        return view('admin.galeri.index', compact('galeri', 'totalKategori', 'fotoUtama'));
    }

    // 2. FIXED: Tambahkan fungsi ini untuk memanggil file create.blade.php
    public function create()
    {
        return view('admin.galeri.create');
    }

    // 3. Proses Simpan Foto Baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'foto'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori'  => 'nullable|string|max:100',
            'deskripsi' => 'nullable|string',
            'is_utama'  => 'nullable|boolean',
        ]);

        $nama_foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_foto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/galeri'), $nama_foto);
        }

        Galeri::create([
            'judul'     => $request->judul,
            'foto'      => $nama_foto,
            'kategori'  => $request->kategori ?? 'Umum',
            'deskripsi' => $request->deskripsi,
            'is_utama'  => $request->has('is_utama') ? (bool)$request->is_utama : false,
        ]);

        // Setelah berhasil simpan, kita alihkan (redirect) ke halaman index utama
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // 4. Proses Hapus Foto
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        if ($galeri->foto && file_exists(public_path('uploads/galeri/' . $galeri->foto))) {
            unlink(public_path('uploads/galeri/' . $galeri->foto));
        }

        $galeri->delete();
        return redirect()->back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}