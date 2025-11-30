@props(['title', 'price', 'period', 'features' => '', 'button', 'featured' => false])
<div class="{{ $featured ? 'bg-blue-600 text-white shadow-2xl scale-105' : 'bg-white border border-gray-200' }} rounded-2xl p-8 {{ $featured ? '' : 'hover:shadow-xl' }} transition">
    @if($featured)
        <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-emerald-500 text-white px-6 py-2 rounded-full text-sm font-bold">
            MOST POPULAR
        </div>
    @endif
    <h3 class="text-2xl font-bold">{{ $title }}</h3>
    <p class="text-4xl font-bold mt-6">{{ $price }}<span class="text-lg opacity-80">{{ $period }}</span></p>
    <ul class="mt-8 space-y-4 {{ $featured ? '' : 'text-gray-600' }}">
        {{ $features }}
    </ul>
    <a href="#" class="mt-10 block w-full py-4 {{ $featured ? 'bg-white text-blue-600' : 'bg-blue-600 text-white' }} rounded-xl font-semibold hover:opacity-90 text-center">
        {{ $button }}
    </a>
</div>
