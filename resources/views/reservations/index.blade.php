@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span>Checkout</span>
                    @isset($reservation)
                        <span class="badge bg-light text-primary">Reservation #{{ $reservation->id }}</span>
                    @endisset
                </div>
                <div class="card-body">
                    @isset($reservation)
                        <h5 class="mb-3">Reservation Summary</h5>

                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Room</span>
                                <strong>{{ optional($reservation->room)->number ?? 'N/A' }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Check-in</span>
                                <strong>{{ $reservation->check_in ?? 'N/A' }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Check-out</span>
                                <strong>{{ $reservation->check_out ?? 'N/A' }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Guests</span>
                                <strong>{{ $reservation->accompany_number ?? 'N/A' }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>{{ number_format($reservation->paid_price , 2) }} USD</strong>
                            </li>
                        </ul>
                    @else
                        <p class="text-muted">No reservation data provided. Pass a <code>$reservation</code> object to this view.</p>
                    @endisset

                    <p class="mb-3">
                        You will be redirected to a secure Stripe Checkout page to complete your payment.
                    </p>

                    <button id="checkout-button"
                            class="btn btn-success w-100"
                            @empty($reservation) disabled @endempty>
                        Pay with Card
                    </button>

                    <small class="text-muted d-block mt-2">
                        By clicking "Pay with Card" you agree to our terms and conditions.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('checkout-button');
            if (!button) return;

            const stripePublicKey = @json(config('services.stripe.key'));
            if (!stripePublicKey) {
                console.warn('Stripe public key (services.stripe.key) is not configured.');
                return;
            }

            const stripe = Stripe(stripePublicKey);

            button.addEventListener('click', function () {
                button.disabled = true;

                fetch(@json(route('stripe.checkout')), {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        reservation_id: @json(optional($reservation)->id),
                    }),
                })
                .then(function (response) {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(function (data) {
                    if (!data.id) {
                        throw new Error('No session ID returned from server.');
                    }
                    return stripe.redirectToCheckout({ sessionId: data.id });
                })
                .then(function (result) {
                    if (result && result.error) {
                        alert(result.error.message);
                        button.disabled = false;
                    }
                })
                .catch(function (error) {
                    console.error('Error starting Stripe Checkout:', error);
                    alert('Unable to start checkout. Please try again later.');
                    button.disabled = false;
                });
            });
        });
    </script>
@endpush --}}
