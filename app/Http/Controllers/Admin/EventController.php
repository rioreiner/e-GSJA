<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(Request $request): View
    {
        $query = Event::with('user');

        if ($search = $request->get('search')) {
            $query->search($search);
        }

        $filter = $request->get('filter', 'all');
        match ($filter) {
            'upcoming' => $query->upcoming(),
            'past'     => $query->past(),
            default    => $query->orderByDesc('tanggal'),
        };

        $events = $query->paginate(12)->withQueryString();

        $upcomingCount = Event::upcoming()->count();
        $pastCount     = Event::past()->count();

        return view('admin.events.index', compact('events', 'upcomingCount', 'pastCount', 'filter'));
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        $data            = $request->validated();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('banner')) {
            $file         = $request->file('banner');
            $filename     = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banner'), $filename);
            $data['banner'] = $filename;
        }

        Event::create($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function show(Event $event): View
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('banner')) {
            if ($event->banner && file_exists(public_path('uploads/banner/' . $event->banner))) {
                unlink(public_path('uploads/banner/' . $event->banner));
            }
            $file           = $request->file('banner');
            $filename       = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/banner'), $filename);
            $data['banner'] = $filename;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        if ($event->banner && file_exists(public_path('uploads/banner/' . $event->banner))) {
            unlink(public_path('uploads/banner/' . $event->banner));
        }
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}