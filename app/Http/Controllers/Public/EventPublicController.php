<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventPublicController extends Controller
{
    public function index()
    {
        // Mengambil data event terbaru beserta user pembuatnya agar tidak bermasalah di blade
        $events = Event::with('user')->latest()->paginate(6);

        // Pastikan folder view Anda adalah 'public.events.index' atau 'events.index'
        return view('public.events.index', compact('events'));
    }

    public function show($id)
    {
        // Mengambil data event berdasarkan ID beserta relasi usernya
        $event = Event::with('user')->findOrFail($id); 

        // FIX: Diarahkan ke 'public.events.show' sesuai dengan struktur folder views Anda
        return view('public.events.show', compact('event'));
    }
}