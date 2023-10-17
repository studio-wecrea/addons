@extends('layouts.app')

@section('content')
    <!-- breadcrums -->
    <div class="container py-4 flex items-center gap-3">
        <a href="{{ route('/') }}" class="text-yellow-600 text-base">
            <i class="fas fa-home"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-sm text-gray-600 font-medium">Shopping cart</p>
    </div>
    <!-- breadcrums end -->

    <!-- payment stripe -->

    <!-- Display a payment form -->
    <div class="container border border-gray-100 rounded">
        <form id="payment-form">
            <div class="sm:w-1/2 mx-auto lg:grid lg:grid-cols-2 gap-2 mt-14">
                <div class="w-full">
                    <button type="button" name="card" class="w-full block text-gray-600 bg-transparent border border-gray-400 px-24 py-5 rounded"><i class="far fa-credit-card mr-2"></i>Card</button>
                </div>
                <div class="w-full">
                    <button type="button" name="card" class="w-full block text-gray-600 bg-transparent border border-gray-400 px-24 py-5 rounded inline-flex gap-2">
                        <svg class="" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                            <path fill="#b2fce3" d="M44,24c0,11.044-8.956,20-20,20S4,35.044,4,24S12.956,4,24,4S44,12.956,44,24z"></path>
                            <path fill="#000100" d="M23.913,36.113c-0.714,0.427-1.506,0.637-2.291,0.637c-0.771,0-1.534-0.196-2.235-0.602l-7.159-4.133	c-1.422-0.82-2.256-2.291-2.228-3.937c0.028-1.639,0.904-3.089,2.354-3.86l6.907-3.706c1.415-0.757,3.061-0.75,4.399,0.021	c1.268,0.736,2.059,2.073,2.109,3.58c0.028,0.967-0.729,1.779-1.695,1.807c-0.995,0.028-1.779-0.729-1.807-1.695	c-0.007-0.301-0.133-0.525-0.357-0.658c-0.28-0.161-0.651-0.147-0.995,0.035L14.008,27.3c-0.448,0.245-0.504,0.665-0.504,0.834	c-0.007,0.168,0.035,0.595,0.476,0.848l7.159,4.133c0.441,0.252,0.827,0.077,0.974-0.007c0.147-0.091,0.483-0.35,0.469-0.855	l-0.054-1.228c-0.025-0.558,0.581-0.919,1.06-0.632l1.849,1.107c0.207,0.124,0.342,0.348,0.343,0.59	C25.786,33.945,25.236,35.316,23.913,36.113z"></path>
                            <path fill="#000100" d="M38,20.232c-0.028,1.639-0.911,3.082-2.361,3.86l-6.907,3.706c-0.708,0.378-1.464,0.567-2.214,0.567	c-0.757,0-1.499-0.196-2.165-0.574c-1.261-0.729-2.038-2.059-2.087-3.566c-0.028-0.967,0.729-1.779,1.695-1.807h0.107	c0.955,0,1.644,0.787,1.702,1.741c0.017,0.277,0.128,0.479,0.334,0.599c0.266,0.154,0.63,0.133,0.974-0.049l6.907-3.699	c0.455-0.245,0.504-0.665,0.511-0.834c0-0.175-0.042-0.595-0.483-0.848l-7.152-4.133c-0.441-0.252-0.834-0.077-0.974,0.007	c-0.147,0.091-0.483,0.343-0.469,0.855c0.031,0.441,0.057,0.803,0.078,1.1c0.04,0.57-0.582,0.945-1.067,0.645l-1.848-1.144	c-0.197-0.122-0.328-0.333-0.335-0.564c-0.046-1.551,0.423-3.047,1.842-3.897c1.408-0.841,3.096-0.855,4.525-0.035l7.152,4.133	C37.187,17.115,38.021,18.586,38,20.232z"></path>
                        </svg>
                        Afterpay
                    </button>
                </div>
                
            </div>

            <div class="w-1/2 mx-auto space-y-4 py-8">
                <div>
                    <label for="" class="text-gray-600 mb-2 block font-roboto">Card number <span class="text-yellow-600">*</span></label>
                    <div class="relative flex items-center justify-center border border-gray-300 rounded">
                    <input type="text" name="firstname" class="block w-full border-0 px-4 py-3 text-gray-600 text-sm rounded placeholder-gray-400 focus:border-primary focus:ring-0" placeholder="1234 1234 1234 1234">
                    <div class="flex items-center justify-center px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                            <path fill="#1565C0" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path>
                            <path fill="#FFF" d="M15.186 19l-2.626 7.832c0 0-.667-3.313-.733-3.729-1.495-3.411-3.701-3.221-3.701-3.221L10.726 30v-.002h3.161L18.258 19H15.186zM17.689 30L20.56 30 22.296 19 19.389 19zM38.008 19h-3.021l-4.71 11h2.852l.588-1.571h3.596L37.619 30h2.613L38.008 19zM34.513 26.328l1.563-4.157.818 4.157H34.513zM26.369 22.206c0-.606.498-1.057 1.926-1.057.928 0 1.991.674 1.991.674l.466-2.309c0 0-1.358-.515-2.691-.515-3.019 0-4.576 1.444-4.576 3.272 0 3.306 3.979 2.853 3.979 4.551 0 .291-.231.964-1.888.964-1.662 0-2.759-.609-2.759-.609l-.495 2.216c0 0 1.063.606 3.117.606 2.059 0 4.915-1.54 4.915-3.752C30.354 23.586 26.369 23.394 26.369 22.206z"></path>
                            <path fill="#FFC107" d="M12.212,24.945l-0.966-4.748c0,0-0.437-1.029-1.573-1.029c-1.136,0-4.44,0-4.44,0S10.894,20.84,12.212,24.945z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                            <path fill="#3F51B5" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path>
                            <path fill="#FFC107" d="M30 14A10 10 0 1 0 30 34A10 10 0 1 0 30 14Z"></path>
                            <path fill="#FF3D00" d="M22.014,30c-0.464-0.617-0.863-1.284-1.176-2h5.325c0.278-0.636,0.496-1.304,0.637-2h-6.598C20.07,25.354,20,24.686,20,24h7c0-0.686-0.07-1.354-0.201-2h-6.598c0.142-0.696,0.359-1.364,0.637-2h5.325c-0.313-0.716-0.711-1.383-1.176-2h-2.973c0.437-0.58,0.93-1.122,1.481-1.595C21.747,14.909,19.481,14,17,14c-5.523,0-10,4.477-10,10s4.477,10,10,10c3.269,0,6.162-1.575,7.986-4H22.014z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                            <path fill="#1976D2" d="M45,35c0,2.209-1.791,4-4,4H7c-2.209,0-4-1.791-4-4V13c0-2.209,1.791-4,4-4h34c2.209,0,4,1.791,4,4V35z"></path>
                            <path fill="#FFF" d="M22.255 20l-2.113 4.683L18.039 20h-2.695v6.726L12.341 20h-2.274L7 26.981h1.815l.671-1.558h3.432l.682 1.558h3.465v-5.185l2.299 5.185h1.563l2.351-5.095v5.095H25V20H22.255zM10.135 23.915l1.026-2.44 1.066 2.44H10.135zM37.883 23.413L41 20.018h-2.217l-1.994 2.164L34.86 20H28v6.982h6.635l2.092-2.311L38.767 27h2.21L37.883 23.413zM33.728 25.516h-4.011v-1.381h3.838v-1.323h-3.838v-1.308l4.234.012 1.693 1.897L33.728 25.516z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                            <path fill="#E1E7EA" d="M45,35c0,2.2-1.8,4-4,4H7c-2.2,0-4-1.8-4-4V13c0-2.2,1.8-4,4-4h34c2.2,0,4,1.8,4,4V35z"></path>
                            <path fill="#FF6D00" d="M45,35c0,2.2-1.8,4-4,4H16c0,0,23.6-3.8,29-15V35z M22,24c0,1.7,1.3,3,3,3s3-1.3,3-3c0-1.7-1.3-3-3-3S22,22.3,22,24z"></path>
                            <path d="M11.2,21h1.1v6h-1.1V21z M17.2,24c0,1.7,1.3,3,3,3c0.5,0,0.9-0.1,1.4-0.3v-1.3c-0.4,0.4-0.8,0.6-1.4,0.6c-1.1,0-1.9-0.8-1.9-2c0-1.1,0.8-2,1.9-2c0.5,0,0.9,0.2,1.4,0.6v-1.3c-0.5-0.2-0.9-0.4-1.4-0.4C18.5,21,17.2,22.4,17.2,24z M30.6,24.9L29,21h-1.2l2.5,6h0.6l2.5-6h-1.2L30.6,24.9z M33.9,27h3.2v-1H35v-1.6h2v-1h-2V22h2.1v-1h-3.2V27z M41.5,22.8c0-1.1-0.7-1.8-2-1.8h-1.7v6h1.1v-2.4h0.1l1.6,2.4H42l-1.8-2.5C41,24.3,41.5,23.7,41.5,22.8z M39.2,23.8h-0.3v-1.8h0.3c0.7,0,1.1,0.3,1.1,0.9C40.3,23.4,40,23.8,39.2,23.8z M7.7,21H6v6h1.6c2.5,0,3.1-2.1,3.1-3C10.8,22.2,9.5,21,7.7,21z M7.4,26H7.1v-4h0.4c1.5,0,2.1,1,2.1,2C9.6,24.4,9.5,26,7.4,26z M15.3,23.3c-0.7-0.3-0.9-0.4-0.9-0.7c0-0.4,0.4-0.6,0.8-0.6c0.3,0,0.6,0.1,0.9,0.5l0.6-0.8C16.2,21.2,15.7,21,15,21c-1,0-1.8,0.7-1.8,1.7c0,0.8,0.4,1.2,1.4,1.6c0.6,0.2,1.1,0.4,1.1,0.9c0,0.5-0.4,0.8-0.9,0.8c-0.5,0-1-0.3-1.2-0.8l-0.7,0.7c0.5,0.8,1.1,1.1,2,1.1c1.2,0,2-0.8,2-1.9C16.9,24.2,16.5,23.8,15.3,23.3z"></path>
                        </svg>
                    </div>
                    </div>
                    

                </div>

                    <div>
                        <label for="" class="text-gray-600 mb-2 block font-roboto">Expiration <span class="text-yellow-600">*</span></label>
                        <input type="text" name="firstname" class="input-box" placeholder="MM/YY">
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-2 block font-roboto">CVC <span class="text-yellow-600">*</span></label>
                        <div class="relative flex items-center justify-center border border-gray-300 rounded">
                            <input type="text" name="firstname" class="block border-0 w-full px-4 py-3 text-gray-600 text-sm rounded placeholder-gray-400 focus:border-primary focus:ring-0 inline-flex" placeholder="CVC">
                            <div class="flex items-center justify-center px-2">
                            <img src="https://img.icons8.com/ios-filled/32/737373/card-security-code.png" class="flex items-center justify-center px-2">

                            </div>

                        </div>

                    </div>
                    <div>
                        <label for="country" class="text-gray-600 mb-2 block">Country</label>
                        <select id="country" name="country" class="input-box" placeholder="Select a country">
                            @foreach( $countries as $countryCode => $countryName)
                            <option>{{$countryCode}} - {{$countryName}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="w-1/2 mx-auto mb-14">
                <button type="submit" class="w-full h-12 text-white border border-yellow-900 bg-primary rounded hover:bg-transparent hover:text-primary hover:border-primary transition"> Secure checkout</button>
            </div>
        </form>
    </div>

    <!-- payment stripe end -->

    @push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        // Create a Stripe client.
        var stripe = Stripe('pk_test_zmKNlnptONWFeIFjx9V6Ft2s');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
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
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        var cardHolderName = document.getElementById('cardholder-name');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', card, {
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            );
            if (error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = error.message;
            } else {
                // Send the token to your server.
                // console.log(paymentMethod);
                stripeTokenHandler(paymentMethod);
            }
            // stripe.createToken(card).then(function(result) {
            //     if (result.error) {
            //     // Inform the user if there was an error.
            //     var errorElement = document.getElementById('card-errors');
            //     errorElement.textContent = result.error.message;
            //     } else {
            //     // Send the token to your server.
            //     stripeTokenHandler(result.token);
            //     }
            // });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(paymentMethod) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', paymentMethod.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>
    @endpush

</body>

</html>
@endsection