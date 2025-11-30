@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <x-hero />

    <!-- Stats Section -->
    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">10K+</div>
                    <div class="text-gray-600 font-medium">Hotels Trust Us</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">50K+</div>
                    <div class="text-gray-600 font-medium">Rooms Managed</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">2M+</div>
                    <div class="text-gray-600 font-medium">Reservations</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl md:text-5xl font-bold text-blue-600 mb-2">99.9%</div>
                    <div class="text-gray-600 font-medium">Uptime</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Everything Your Hotel Needs</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto">Powerful, intuitive tools designed for real hotel operations. Streamline your workflow and delight your guests.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-feature-card icon="🏨" title="Room Inventory Management">
                    Real-time room status, types, rates, and availability in one glance. Never overbook again.
                </x-feature-card>
                <x-feature-card icon="📅" title="Drag & Drop Calendar">
                    Visual reservation calendar with color-coding and instant updates. Manage bookings effortlessly.
                </x-feature-card>
                <x-feature-card icon="👤" title="Guest Profiles & History">
                    Full guest database with stay history, preferences, and notes. Personalize every stay.
                </x-feature-card>
                <x-feature-card icon="🔑" title="Check-in / Check-out">
                    One-click check-in, ID scan, digital registration cards. Speed up front desk operations.
                </x-feature-card>
                <x-feature-card icon="🧹" title="Housekeeping Management">
                    Assign tasks, track cleaning status, and maintenance requests. Keep rooms ready faster.
                </x-feature-card>
                <x-feature-card icon="💳" title="Payments & Invoices">
                    Integrated billing, deposits, POS, and automatic receipts. Handle payments seamlessly.
                </x-feature-card>
            </div>
        </div>
    </section>

    <!-- Room Types Section -->
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Manage Every Room Type Beautifully</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">From standard singles to luxury suites, manage all your room types with ease and elegance.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $roomTypes = [
                        ['Single Room', 'Perfect for solo travelers seeking comfort and convenience', 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&q=80', '$89/night'],
                        ['Double Room', 'Spacious comfort for two with modern amenities', 'https://images.unsplash.com/photo-1578683015172-0bb5f4f8e5e4?w=800&q=80', '$129/night'],
                        ['Executive Suite', 'Luxury with separate living area and premium services', 'https://images.unsplash.com/photo-1618778599950-914b6a4e2e40?w=800&q=80', '$249/night'],
                    ];
                @endphp
                @foreach($roomTypes as $room)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $room[2] }}" alt="{{ $room[0] }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full shadow-md">
                                <span class="text-sm font-semibold text-blue-600">{{ $room[3] }}</span>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $room[0] }}</h3>
                            <p class="text-gray-600 mb-6">{{ $room[1] }}</p>
                            <a href="{{ route('rooms.index') }}" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                                View Rooms
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition-all duration-200 transform hover:scale-105">
                    Explore All Rooms
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    @include('partials.benefits')

    <!-- Dashboard Preview Section -->
    @include('partials.dashboard-preview')

    <!-- How It Works Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Get Started in Minutes</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Setting up HotelMaster is quick and easy. Start managing your hotel better today.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-12 max-w-5xl mx-auto">
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sign Up Free</h3>
                    <p class="text-gray-600">Create your account in seconds. No credit card required for the trial.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Add Your Rooms</h3>
                    <p class="text-gray-600">Import your room inventory or add them manually. Our team can help you migrate.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Start Managing</h3>
                    <p class="text-gray-600">Begin accepting reservations, managing guests, and running your hotel efficiently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    @include('partials.pricing')

    <!-- Testimonials Section -->
    @include('partials.testimonials')

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-br from-blue-600 to-purple-600">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">Ready to Transform Your Hotel Management?</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">Join thousands of hotels already using HotelMaster to streamline operations and delight guests.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @guest
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl shadow-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105">
                        Start Free Trial
                    </a>
                @else
                    <a href="{{ route('rooms.index') }}" class="px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl shadow-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105">
                        View Dashboard
                    </a>
                @endguest
                <a href="#" class="px-8 py-4 bg-transparent border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-blue-600 transition-all duration-200">
                    Schedule Demo
                </a>
            </div>
            <p class="mt-8 text-blue-100 text-sm">No credit card required • 14-day free trial • Cancel anytime</p>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')
@endsection
