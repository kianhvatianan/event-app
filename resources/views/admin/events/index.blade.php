@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-4">Events List</h1>
    
    <a href="{{ route('admin.events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Event</a>
    
    <table class="min-w-full bg-white border border-gray-300 rounded-md">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Title</th>
                <th class="px-4 py-2 border-b">Date</th>
                <th class="px-4 py-2 border-b">Status</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td class="px-4 py-2 border-b">{{ $event->title }}</td>
                    <td class="px-4 py-2 border-b">{{ $event->date->format('Y-m-d H:i') }}</td>
                    <td class="px-4 py-2 border-b">{{ ucfirst($event->status) }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="{{ route('admin.events.edit', $event->id) }}" class="text-yellow-500">Edit</a> |
                        <a href="{{ route('admin.events.show', $event->id) }}" class="text-blue-500">show</a> |
                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
