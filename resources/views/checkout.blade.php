{{-- @extends('header')
@section('content')
    <h2 class="font-bold text-3xl text-center"><i class="ri-shopping-cart-fill"></i>Checkout</h2>

    <div class="grid grid-cols-4 gap-20 p-4 px-24">
        <div class="bg-gray-100 text-center font-bold p-4"> <img src="{{asset('logo/esewa_og.webp')}}" alt="" class="h-40"> E-sewa</div>
        <div class="bg-gray-100 text-center font-bold p-4"> <img src="{{asset('logo/khalti.jpg')}}" alt="" class="h-40"> Khalti</div>
        <div class="bg-gray-100 text-center font-bold p-4"> <img src="{{asset('logo/imepay.jpg')}}" alt="" class="h-40"> IME Pay</div>
        <div class="border-l-2 border-red-200 px-2">
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl font-semibold text-center">Summary</h2>
                <p class="text-1xl font-semibold">Total Price: Rs. {{$cart->package->price + $cart->itemprice * $cart->no_of_people}}</p>
                <button class="bg-blue-600 w-52 text-white px-4 py-2 rounded-lg mt-5 ml-5">Pay Now</button>
                <a href="{{route('cart.index')}}" class="bg-red-600 w-52 text-center text-white px-4 py-2 rounded-lg mt-5 ml-5">Cancel</a>
            </div>
        </div>
    </div>
@endsection --}}

@extends('header')

@section('content')
    <h2 class="font-bold text-3xl text-center"><i class="ri-shopping-cart-fill"></i>Checkout</h2>

    <div class="grid grid-cols-3 gap-20 p-4 px-24">
        <!-- E-sewa Option -->
        <div class="payment-option bg-gray-100 text-center font-bold p-4 cursor-pointer" data-method="esewa">
            <input type="radio" name="payment_method" id="esewa" value="esewa" class="hidden">
            <label for="esewa" class="block py-2">
                <img src="{{asset('logo/esewa_og.webp')}}" alt="E-sewa" class="mx-auto h-40">
                <p>E-sewa</p>
            </label>
        </div>

        <!-- Khalti Option -->
        <div class="payment-option bg-gray-100 text-center font-bold p-4 cursor-pointer" data-method="khalti">
            <input type="radio" name="payment_method" id="khalti" value="khalti" class="hidden">
            <label for="khalti" class="block py-2">
                <img src="{{asset('logo/khalti.jpg')}}" alt="Khalti" class="mx-auto h-40">
                <p>Khalti</p>
            </label>
        </div>

        <!-- IME Pay Option -->
        <div class="payment-option bg-gray-100 text-center font-bold p-4 cursor-pointer" data-method="imepay">
            <input type="radio" name="payment_method" id="imepay" value="imepay" class="hidden">
            <label for="imepay" class="block py-2">
                <img src="{{asset('logo/imepay.jpg')}}" alt="IME Pay" class="mx-auto h-40">
                <p>IME Pay</p>
            </label>
        </div>
    </div>

    <!-- Summary Section with Pay Now Button -->
    <div class="border-l-2 border-red-200 px-2">
        <div class="flex flex-col justify-center">
            <h2 class="text-2xl font-semibold text-center">Summary</h2>
            <p class="text-1xl font-semibold text-center">Package name: {{ $cart->package->name }}</p>
            <p class="text-1xl font-semibold text-center">Booking Date: {{$cart->booking_date}}</p>
            <p class="text-1xl font-semibold text-center">No. of People: {{$cart->no_of_people}}</p>
            <p class="text-2xl font-bold text-center">Total Price: Rs.{{$totalprice}}</p>

            <!-- Pay Now Form -->
            <form id="paymentForm" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                <!-- Hidden input to store selected payment method -->
                <input type="hidden" id="selectedPaymentMethod" name="payment_method" value="esewa">

                <input type="hidden" id="amount" name="amount" value="{{$totalprice}}" required>
                <input type="hidden" id="tax_amount" name="tax_amount" value="0" required>
                <input type="hidden" id="total_amount" name="total_amount" value="{{$totalprice}}" required>
                <input type="hidden" id="transaction_uuid" name="transaction_uuid" required>
                <input type="hidden" id="product_code" name="product_code" value="EPAYTEST" required>
                <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                <input type="hidden" id="success_url" name="success_url" value="{{route('order.store',[$cart->id,$totalprice])}}" required>
                <input type="hidden" id="failure_url" name="failure_url" value="{{route('cart.index')}}" required>
                <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                <input type="hidden" id="signature" name="signature" required>
                <div class="flex justify-center space-x-4 mt-4">
                    <input value="Pay Now" type="submit" id="payNowButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4" disabled>
                    <a href="{{route('cart.index')}}" class="bg-red-500 hover:bg-red-700 w-28 text-center text-white px-4 py-2 rounded-lg mt-4 ">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    @php
        $transaction_uuid = uniqid();
        $product_code = "EPAYTEST";
        $data = "total_amount=".$totalprice.",transaction_uuid=".$transaction_uuid.",product_code=".$product_code;
        $secret = "8gBm/:&EnhH.1/q";
        $s = hash_hmac('sha256', $data, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = "{{$transaction_uuid}}";
        document.getElementById('signature').value = "{{$signature}}";

        const paymentOptions = document.querySelectorAll('.payment-option');
        const paymentForm = document.getElementById('paymentForm');
        const payNowButton = document.getElementById('payNowButton');
        const selectedPaymentMethod = document.getElementById('selectedPaymentMethod');

        paymentOptions.forEach(option => {
            option.addEventListener('click', function() {
                payNowButton.disabled = false;  // Enable Pay Now button
                const selectedValue = this.getAttribute('data-method');
                selectedPaymentMethod.value = selectedValue;  // Set the selected payment method

                // Remove inline styles for border from all options
                paymentOptions.forEach(opt => {
                    opt.style.border = '2px solid transparent';
                });

                // Set border for the selected option
                this.style.border = '4px solid green';

                // Dynamically update the form action based on the selected payment method
                if (selectedValue === 'esewa') {
                    paymentForm.action = "https://rc-epay.esewa.com.np/api/epay/main/v2/form";
                } else if (selectedValue === 'khalti') {
                    paymentForm.action = "https://khalti.com/payment/initiate/";
                } else if (selectedValue === 'imepay') {
                    paymentForm.action = "https://imepay.com.np/api/v1/payment";
                }
            });
        });
    </script>
@endsection




