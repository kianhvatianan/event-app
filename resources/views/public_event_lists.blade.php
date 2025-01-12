<!-- resources/views/public/events/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Upcoming Events</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($events as $event)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="w-full h-48 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-semibold">{{ $event->title }}</h2>
                    <p class="text-gray-600 mb-2">{{ $event->date->format('Y-m-d H:i') }}</p>
                    <p class="text-gray-500">{{ Str::limit($event->description, 100) }}</p>
                    <a href="{{ route('public.events.show', $event->id) }}" class="text-blue-500 mt-2 inline-block">See Details</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
