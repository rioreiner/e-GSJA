<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\JadwalIbadah;
use App\Models\Post;
use Illuminate\View\View;

class JemaatDashboardController extends Controller
{
    public function index(): View
    {
        $upcomingEvents   = Event::upcoming()->take(6)->get();
        $upcomingJadwal   = JadwalIbadah::upcoming()->take(5)->get();
        $recentBerita     = Post::published()->latest()->take(6)->get();

        return view('jemaat.dashboard', compact(
            'upcomingEvents',
            'upcomingJadwal',
            'recentBerita'
        ));
    }
}