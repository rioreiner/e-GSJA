<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Event;
use App\Models\JadwalIbadah;
use App\Models\Galeri;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();

        $events = Event::latest()->take(3)->get();

        $jadwal = JadwalIbadah::latest()->take(5)->get();

        $galeris = Galeri::latest()->get();

        return view('public.home', compact(
            'posts',
            'events',
            'jadwal',
            'galeris'
        ));
    }
}