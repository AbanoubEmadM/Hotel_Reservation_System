<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">Simple & Transparent Pricing</h2>
            <p class="mt-4 text-xl text-gray-600">One hotel. One flat price. No surprises.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-10 max-w-5xl mx-auto">
            <x-pricing-card title="Starter" price="$79" period="/month" button="Choose Starter">
                <li>Up to 50 rooms</li>
                <li>Core PMS features</li>
                <li>Email support</li>
            </x-pricing-card>

            <x-pricing-card title="Professional" price="$149" period="/month" button="Choose Professional" :featured="true">
                <li>Up to 150 rooms</li>
                <li>All features included</li>
                <li>Priority phone support</li>
                <li>Free onboarding</li>
            </x-pricing-card>

            <x-pricing-card title="Lifetime License" price="$2,999" period=" one-time" button="Buy Lifetime">
                <li class="text-gray-300">Own it forever</li>
                <li class="text-gray-300">All future updates</li>
                <li class="text-gray-300">No monthly fees</li>
                <li class="text-gray-300">Priority lifetime support</li>
            </x-pricing-card>
        </div>
    </div>
</section>
