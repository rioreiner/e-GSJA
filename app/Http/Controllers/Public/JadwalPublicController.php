<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;

class JadwalPublicController extends Controller
{
    // 🔵 LIST JADWAL
    public function index()
    {
        $jadwal = JadwalIbadah::orderBy('tanggal', 'asc')
            ->paginate(10);

        return view('public.jadwal.index', compact('jadwal'));
    }

    // 🔵 DETAIL JADWAL (SHOW)
    public function show($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);

        return view('public.jadwal.show', compact('jadwal'));
    }
}