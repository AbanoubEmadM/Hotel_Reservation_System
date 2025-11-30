@props(['room'])

<div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <!-- Room Image -->
    <div class="relative h-64 overflow-hidden">
        @if($room->image)
            <img src="{{ $room->image }}" alt="{{ $room->roomType->name ?? 'Room' }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
        @else
            <div class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
            </div>
        @endif

        <!-- Status Badge -->
        <div class="absolute top-4 right-4">
            @php
                $statusColors = [
                    'available' => 'bg-green-500',
                    'occupied' => 'bg-red-500',
                    'cleaning' => 'bg-yellow-500',
                    'maintenance' => 'bg-orange-500',
                    'reserved' => 'bg-blue-500',
                ];
                $statusColor = $statusColors[$room->status] ?? 'bg-gray-500';
            @endphp
            <span class="{{ $statusColor }} text-white px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wide">
                {{ ucfirst($room->status) }}
            </span>
        </div>
    </div>

    <!-- Room Content -->
    <div class="p-6">
        <!-- Room Type & Number -->
        <div class="flex items-start justify-between mb-3">
            <div>
                <h3 class="text-2xl font-bold text-gray-900 mb-1">
                    {{ $room->roomType->name ?? 'Room' }}
                </h3>
                <p class="text-sm text-gray-500">Room #{{ $room->number }}</p>
            </div>
            <div class="text-right">
                <p class="text-3xl font-bold text-blue-600">${{ number_format($room->price, 2) }}</p>
                <p class="text-xs text-gray-500">per night</p>
            </div>
        </div>

        <!-- Room Features -->
        <div class="flex items-center gap-4 mb-4 text-sm text-gray-600">
            <div class="flex items-center gap-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="font-medium">{{ $room->capacity }} Guest(s)</span>
            </div>
            <div class="flex items-center gap-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="font-medium">{{ $room->beds }} Bed(s)</span>
            </div>
            <div class="flex items-center gap-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="font-medium">{{ $room->baths }} Bath(s)</span>
            </div>
        </div>

        <!-- Description -->
        @if($room->description)
            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                {{ $room->description }}
            </p>
        @endif

        <!-- Action Button -->
        <div class="pt-4 border-t border-gray-200">
            @if($room->status === 'reserved')
                <a href="{{ route('rooms.show', $room->id) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                    View Details
                </a>
            @endif
            @if($room->status !== 'available' && $room->status !== 'reserved')
                <button disabled class="block w-full bg-gray-300 text-gray-500 text-center font-semibold py-3 px-4 rounded-lg cursor-not-allowed">
                    Not Available
                </button>
            @endif
            @if($room->status === 'available')
                <a href="{{ route('rooms.show', $room->id) }}" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition-colors duration-200">
                    Book Now
                </a>
            @endif
        </div>
    </div>
</div>
