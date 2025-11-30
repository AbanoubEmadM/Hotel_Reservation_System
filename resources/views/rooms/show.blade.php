@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('rooms.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Rooms
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <!-- Room Image Section -->
        <div class="relative h-96 md:h-[500px] overflow-hidden">
            @if($room->image)
                <img src="{{ $room->image }}" alt="{{ $room->roomType->name ?? 'Room' }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center">
                    <svg class="w-32 h-32 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>
            @endif

            <!-- Status Badge -->
            <div class="absolute top-6 right-6">
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
                <span class="{{ $statusColor }} text-white px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide shadow-lg">
                    {{ ucfirst($room->status) }}
                </span>
            </div>
        </div>

        <!-- Room Details Section -->
        <div class="p-8 md:p-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Header -->
                    <div class="mb-6">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2">
                            {{ $room->roomType->name ?? 'Room' }}
                        </h1>
                        <p class="text-xl text-gray-600">Room #{{ $room->number }}</p>
                    </div>

                    <!-- Price -->
                    <div class="mb-8 p-6 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl border border-blue-100">
                        <div class="flex items-baseline gap-2">
                            <span class="text-5xl font-bold text-blue-600">${{ number_format($room->price, 2) }}</span>
                            <span class="text-gray-600 text-lg">per night</span>
                        </div>
                    </div>

                    <!-- Room Features -->
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Room Features</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                <div class="p-3 bg-blue-100 rounded-lg">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Capacity</p>
                                    <p class="text-xl font-semibold text-gray-900">{{ $room->capacity }} Guest(s)</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                <div class="p-3 bg-purple-100 rounded-lg">
                                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Beds</p>
                                    <p class="text-xl font-semibold text-gray-900">{{ $room->beds }} Bed(s)</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                <div class="p-3 bg-pink-100 rounded-lg">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Bathrooms</p>
                                    <p class="text-xl font-semibold text-gray-900">{{ $room->baths }} Bath(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    @if($room->description)
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
                            <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                                {{ $room->description }}
                            </p>
                        </div>
                    @else
                        <div class="mb-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
                            <p class="text-gray-500 text-lg italic">
                                No description available for this room.
                            </p>
                        </div>
                    @endif

                    <!-- Additional Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Room Information</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Room Number</span>
                                <span class="font-semibold text-gray-900">#{{ $room->number }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Room Type</span>
                                <span class="font-semibold text-gray-900">{{ $room->roomType->name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <span class="text-gray-600">Status</span>
                                <span class="font-semibold {{ $statusColor }} text-white px-3 py-1 rounded-full text-sm uppercase">
                                    {{ ucfirst($room->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar - Booking Section -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8">
                        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-100 shadow-lg">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Reserve This Room</h3>

                            <div class="mb-6">
                                <div class="text-center mb-4">
                                    <span class="text-4xl font-bold text-blue-600">${{ number_format($room->price, 2) }}</span>
                                    <span class="text-gray-600 block mt-1">per night</span>
                                </div>
                            </div>

                            @if($room->status === 'available')
                                <a href="#" class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-4 px-6 rounded-lg transition-colors duration-200 mb-4 shadow-md hover:shadow-lg">
                                    Book Now
                                </a>
                            @elseif($room->status === 'reserved')
                                <button class="block w-full bg-blue-500 text-white text-center font-semibold py-4 px-6 rounded-lg mb-4 shadow-md">
                                    View Reservation
                                </button>
                            @else
                                <button disabled class="block w-full bg-gray-300 text-gray-500 text-center font-semibold py-4 px-6 rounded-lg cursor-not-allowed mb-4">
                                    Not Available
                                </button>
                            @endif

                            <div class="space-y-3 text-sm text-gray-600">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Free cancellation</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Best price guarantee</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Instant confirmation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

