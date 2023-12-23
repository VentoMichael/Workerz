@extends('layouts.layout')
@section('title', 'Freelancer Payment Confirmation')
@section('description', 'Confirm your payment details and complete your freelancer account setup on Workerz.')
@section('keywords', 'freelancer payment confirmation, account setup, payment details, Workerz')



@section('content')

    <div class="relative bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover"
                 src="https://images.unsplash.com/photo-1525130413817-d45c1d127c42?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1920&q=60&&sat=-100"
                 alt="">
            <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Secure payment for
                freelancers</h1>
            <p class="mt-6 max-w-3xl text-xl text-gray-300"> Thank you for choosing to become a part of our freelancer
                community. We are committed to providing you with the best experience possible. To ensure the security
                of your payment, please select your preferred payment method below.</p>
        </div>
    </div>
    <livewire:payment-form/>




@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ config('app.stripeKeyPublic') }}');
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {hidePostalCode: true, style: style});
        card.mount('#card-element');
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();
            cardButton.disabled = true;
            cardButton.classList.add('opacity-50');
            const loadingSvg = document.getElementById('loading-svg');
            loadingSvg.classList.remove('hidden');
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
            if (error) {
                cardButton.disabled = false;
                cardButton.classList.remove('opacity-50');
                loadingSvg.classList.add('hidden');

                const errorElement = document.createElement('p');
                errorElement.className = 'text-red-500 mt-1';
                errorElement.textContent = error.message;

                const errorContainer = document.getElementById('card-errors');
                errorContainer.innerHTML = '';
                errorContainer.appendChild(errorElement);
            } else {
                var form = document.getElementById('subscribe-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'payment_method');
                hiddenInput.setAttribute('value', setupIntent.payment_method);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });


    </script>



    @livewire('wire-elements-modal')

@endsection
