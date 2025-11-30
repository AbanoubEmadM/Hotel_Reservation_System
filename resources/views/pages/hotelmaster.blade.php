@extends('layouts.app')

@section('content')
    <x-hero />
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold">Everything Your Hotel Needs</h2>
                <p class="mt-4 text-xl text-gray-600">Powerful, intuitive tools designed for real hotel operations</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <x-feature-card icon="🏨" title="Room Inventory Management">
                    Real-time room status, types, rates, and availability in one glance.
                </x-feature-card>
                <x-feature-card icon="Calendar" title="Drag & Drop Calendar">
                    Visual reservation calendar with color-coding and instant updates.
                </x-feature-card>
                <x-feature-card icon="User" title="Guest Profiles & History">
                    Full guest database with stay history, preferences, and notes.
                </x-feature-card>
                <x-feature-card icon="Key" title="Check-in / Check-out">
                    One-click check-in, ID scan, digital registration cards.
                </x-feature-card>
                <x-feature-card icon="Broom" title="Housekeeping Management">
                    Assign tasks, track cleaning status, and maintenance requests.
                </x-feature-card>
                <x-feature-card icon="Credit Card" title="Payments & Invoices">
                    Integrated billing, deposits, POS, and automatic receipts.
                </x-feature-card>
            </div>
        </div>
    </section>

    <!-- Room Types -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Manage Every Room Type Beautifully</h2>
            <p class="text-xl text-gray-600 mb-12">From standard singles to luxury suites</p>
            <div class="grid md:grid-cols-3 gap-10">
                @foreach([
                    ['Single Room', 'Perfect for solo travelers', 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800'],
                    ['Double Room', 'Spacious comfort for two', 'https://images.unsplash.com/photo-1578683015172-0bb5f4f8e5e4?w=800'],
                    ['Executive Suite', 'Luxury with separate living area', 'https://images.unsplash.com/photo-1618778599950-914b6a4e2e40?w=800'],
                ] as $room)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                        <img src="{{ $room[2] }}" alt="{{ $room[0] }}" class="w-full h-64 object-cover">
                        <div class="p-8">
                            <h3 class="text-2xl font-bold">{{ $room[0] }}</h3>
                            <p class="text-gray-600 mt-2">{{ $room[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Benefits + Dashboard + Pricing + Testimonials -->
    @include('partials.benefits')
    @include('partials.dashboard-preview')
    @include('partials.pricing')
    @include('partials.testimonials')
    @include('partials.footer')
@endsection
