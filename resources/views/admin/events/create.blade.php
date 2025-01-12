@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Create New Event</h1>
    
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('title') }}">
            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border rounded-md">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Event Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border rounded-md">
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-700">Date and Time</label>
            <input type="datetime-local" name="date" id="date" 
                    class="mt-1 block w-full px-4 py-2 border rounded-md" 
                    value="{{ old('date') ?? now()->format('Y-m-d\TH:i') }}">
            @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
            <input type="text" name="platform" id="platform" class="mt-1 block w-full px-4 py-2 border rounded-md" value="{{ old('platform') }}">
            @error('platform') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border rounded-md">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Event</button>
    </form>
</div>
@endsection
