<?php

// app/Http/Controllers/Public/PublicEventController.php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;

class PublicEventController extends Controller
{
    public function index()
    {
        // Ambil semua event yang aktif dan belum berakhir
        $events = Event::where('status', 'active')
                       ->where('date', '>=', now())
                       ->get();

        return view('public_event_lists', compact('events'));
    }

    public function show($id)
    {
        // Ambil event berdasarkan ID
        $event = Event::findOrFail($id);

        return view('public_event_show', compact('event'));
    }
}
