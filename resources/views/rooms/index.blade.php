@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">Our Rooms</h1>
        <p class="text-gray-600">Choose from our selection of comfortable and luxurious accommodations</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($rooms as $room)
            <x-room-card :room="$room" />
        @endforeach
    </div>

    @if($rooms->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No rooms available at the moment.</p>
        </div>
    @endif
    {{ $rooms->links() }}
</div>
@endsection
