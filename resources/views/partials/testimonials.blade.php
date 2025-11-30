<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-16">Trusted by Hotel Owners Worldwide</h2>
        <div class="grid md:grid-cols-3 gap-10">
            @foreach([
                ['James Morrison', 'The Seaside Inn', 'Finally a system that just works. No more Excel chaos!'],
                ['Maria Gonzalez', 'Mountain View Hotel', 'Housekeeping module saved us hours every day. Worth every penny.'],
                ['Thomas Lee', 'City Center Boutique', 'We went from 3 software tools to just HotelMaster. Life-changing.'],
            ] as $t)
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                    <div class="flex text-yellow-500 mb-4">★★★★★</div>
                    <p class="italic text-gray-700">“{{ $t[2] }}”</p>
                    <div class="mt-6 flex items-center">
                        <img src="https://randomuser.me/api/portraits/{{ $loop->index == 0 ? 'men' : 'women' }}/{{ $loop->index * 32 }}.jpg"
                             class="w-12 h-12 rounded-full" alt="{{ $t[0] }}">
                        <div class="ml-4">
                            <p class="font-semibold">{{ $t[0] }}</p>
                            <p class="text-sm text-gray-500">{{ $t[1] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
