<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Display a listing of events
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    // Show form to create a new event
    public function create()
    {
        return view('admin.events.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'platform' => 'required|string',
            'link' => 'nullable|url',
            'capacity' => 'nullable|integer',
            'status' => 'required|in:active,completed,canceled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); 
        } else {
            $imageName = null;
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'date' => $request->date,
            'platform' => $request->platform,
            'link' => $request->link,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    // Show the form to edit the event
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    // Update the specified event in the database
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'platform' => 'required|string',
            'link' => 'nullable|url',
            'capacity' => 'nullable|integer',
            'status' => 'required|in:active,completed,canceled',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path('images/' . $event->image))) {
                unlink(public_path('images/' . $event->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);  // Menyimpan gambar di public/images
        } else {
            $imageName = $event->image;  
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'date' => $request->date,
            'platform' => $request->platform,
            'link' => $request->link,
            'capacity' => $request->capacity,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event'));
    }

    // Delete the specified event
    public function destroy(Event $event)
    {
        // Delete the image file if exists
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
