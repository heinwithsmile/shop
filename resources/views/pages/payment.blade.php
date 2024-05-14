@extends('layouts.master')
@section('content')
    <div class="container">
        <form action="{{ route('process.payment') }}" method="POST" id="payment-form">
            @csrf
            <label for="cardholderName">Cardholder's Name</label>
            <input type="text" id="cardholderName" name="cardholderName" required><br>

            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" required><br>

            <label for="expMonth">Expiration Month</label>
            <input type="text" id="expMonth" name ="expMonth" required><br>

            <label for="expYear">Expiration Year</label>
            <input type="text" id="expYear" name="expYear" required><br>

            <label for="cvc">CVC</label>
            <input type="text" id="cvc" name="cvc" required><br>

            <button type="submit">Submit Payment</button>
        </form>
    </div>
@endsection
@push('scripts')
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}
    {{-- <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });
    </script> --}}
@endpush
