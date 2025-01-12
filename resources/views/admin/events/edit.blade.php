@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Edit Event</h1>
    
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('title', $event->title) }}">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border rounded-md">{{ old('description', $event->description) }}</textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Event Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border rounded-md">
            <p class="text-gray-500 text-sm mt-1">Current image: <img src="{{ asset('images/' . $event->image) }}" alt="Event Image" class="w-32 h-32 object-cover mt-2"></p>
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Date and Time</label>
            <input type="datetime-local" name="date" id="date" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('date', $event->date->format('Y-m-d\TH:i')) }}">
            @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
            <input type="text" name="platform" id="platform" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('platform', $event->platform) }}">
            @error('platform') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border rounded-md">
                <option value="active" {{ old('status', $event->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ old('status', $event->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ old('status', $event->status) == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Event</button>
    </form>
</div>
@endsection
