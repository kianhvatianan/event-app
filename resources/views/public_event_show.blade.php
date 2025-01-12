<!-- resources/views/public/events/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $event->title }}</h1>

        <div class="mb-6">
            <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="w-full max-w-md mx-auto mb-4">
        </div>

        <div class="mb-6">
            <strong>Description:</strong>
            <p>{!! nl2br(e($event->description)) !!}</p>
        </div>

        <div class="mb-6">
            <strong>Date:</strong>
            <p>{{ $event->date->format('Y-m-d H:i') }}</p>
        </div>

        <div class="mb-6">
            <strong>Platform:</strong>
            <p>{{ $event->platform }}</p>
        </div>

        <div class="mb-6">
            <strong>Status:</strong>
            <p>{{ ucfirst($event->status) }}</p>
        </div>

        @if($event->link)
            <div class="mb-6">
                <strong>Event Link:</strong>
                <p><a href="{{ $event->link }}" class="text-blue-500" target="_blank">Join Event</a></p>
            </div>
        @endif

        <a href="{{ route('public.events.index') }}" class="text-blue-500">Back to Events List</a>
    </div>
@endsection
