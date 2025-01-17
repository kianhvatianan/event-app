<?php

// app/Http/Controllers/Public/PublicEventController.php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;

class PublicEventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'active')
                       ->where('date', '>=', now())
                       ->get();

        return view('public_event_lists', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('public_event_show', compact('event'));
    }


    public function registerForEvent(Event $event)
    {
        $user = auth()->user();

        // Pastikan user login dan memiliki role member
        if (!$user || !$user->isMember()) {
            return redirect()->route('login')->with('error', 'Please login as a member to register for an event.');
        }

        // Cek apakah user sudah terdaftar di event
        if ($user->events()->where('event_id', $event->id)->exists()) {
            return redirect()->route('public.events.index')->with('error', 'You are already registered for this event.');
        }

        EventRegistration::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'registered_at' => now(),
        ]);

        return redirect()->route('public.events.index')->with('success', 'You have successfully registered for the event.');
    }

    

}
