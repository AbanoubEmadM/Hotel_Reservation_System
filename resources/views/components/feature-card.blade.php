<div class="bg-gray-50 p-8 rounded-2xl border border-gray-200 hover:shadow-xl hover:-translate-y-2 transition">
    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center text-2xl mb-6">
        {{ $icon }}
    </div>
    <h3 class="text-xl font-semibold mb-3">{{ $title }}</h3>
    <p class="text-gray-600">{{ $slot }}</p>
</div>
