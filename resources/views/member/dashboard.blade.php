@extends('layouts.member')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->user()->name }}!</h1>
    
    <div class="mt-4">
        <h2 class="text-2xl font-semibold mb-4">Your Registered Events</h2>
        @if($events->isEmpty())
            <p class="text-gray-600">You haven't registered for any events yet.</p>
        @else
            <ul class="space-y-4">
                @foreach($events as $event)
                    <li class="p-4 border rounded-lg bg-white shadow-sm">
                        <h3 class="text-xl font-semibold">{{ $event->title }}</h3>
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('Y-m-d H:i') }}</p>
                        <p><strong>Platform:</strong> {{ ucfirst($event->platform) }}</p>
                        <p><strong>Link:</strong> <a href="{{ $event->link }}" target="_blank" class="text-blue-500">{{ $event->link }}</a></p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
