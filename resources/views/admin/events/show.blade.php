@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">{{ $event->title }}</h1>
    
    <div class="mb-4">
        <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="w-full max-w-md mx-auto mb-4">
    </div>

    <div class="mb-4">
        <strong>Description:</strong>
        <p>{!! nl2br(e($event->description)) !!}</p>
    </div>

    <div class="mb-4">
        <strong>Date:</strong>
        <p>{{ $event->date->format('Y-m-d H:i') }}</p>
    </div>

    <div class="mb-4">
        <strong>Platform:</strong>
        <p>{{ $event->platform }}</p>
    </div>

    <div class="mb-4">
        <strong>Status:</strong>
        <p>{{ ucfirst($event->status) }}</p>
    </div>
</div>
@endsection