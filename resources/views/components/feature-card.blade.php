<div class="bg-white p-8 rounded-2xl border border-gray-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mb-6">
        <span class="text-3xl">{{ $icon }}</span>
    </div>
    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $title }}</h3>
    <p class="text-gray-600 leading-relaxed">{{ $slot }}</p>
</div>
