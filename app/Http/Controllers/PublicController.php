<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Event;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\JadwalIbadah;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function welcome(): View
    {
        $totalJemaat = Jemaat::count();
        $totalEvent = Event::count();
        $totalJadwal = JadwalIbadah::count();

        return view('welcome', compact(
            'totalJemaat',
            'totalEvent',
            'totalJadwal'
        ));
    }

    public function home(): View
    {
        $posts = Post::latest()->take(5)->get();

        $events = Event::latest()->take(5)->get();

        $jadwal = JadwalIbadah::latest()->take(5)->get();

        return view('public.home', compact(
            'posts',
            'events',
            'jadwal'
        ));
    }

    public function berita(): View
    {
        $posts = Post::latest()->paginate(9);

        return view('public.berita.index', compact('posts'));
    }

    public function showBerita(string $slug): View
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('public.berita.show', compact('post'));
    }

    public function events(): View
    {
        $events = Event::latest()->paginate(9);

        return view('public.events.index', compact('events'));
    }

    public function jadwal(): View
    {
        $jadwal = JadwalIbadah::latest()->paginate(10);

        return view('public.jadwal.index', compact('jadwal'));
    }

    public function keuangan(): View
    {
        $keuangan = Keuangan::latest()->paginate(10);

        $totalPemasukan = Keuangan::where('jenis', 'pemasukan')
            ->sum('jumlah');

        $totalPengeluaran = Keuangan::where('jenis', 'pengeluaran')
            ->sum('jumlah');

        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('public.keuangan.index', compact(
            'keuangan',
            'totalPemasukan',
            'totalPengeluaran',
            'saldo'
        ));
    }
}