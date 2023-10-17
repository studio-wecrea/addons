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
        <p class="text-gray-600 font-medium">Shopping cart</p>
    </div>
    <!-- breadcrums end -->


    <!-- checkout wrapper -->
    <div class="container grid grid-cols-12 gap-6 items-start pb-16 pt-4">
        <!-- checkout form -->
        <div class="col-span-8 border border-gray-200 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">checkout</h3>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="" class="text-gray-600 mb-2 block">First Name <span class="text-yellow-600">*</span></label>
                        <input type="text" name="firstname" class="input-box">
                    </div>
                    <div>
                        <label for="" class="text-gray-600 mb-2 block">Last Name <span class="text-yellow-600">*</span></label>
                        <input type="text" name="firstname" class="input-box">
                    </div>
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Company Name</label>
                    <input type="text" name="company" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Street Address<span class="text-yellow-600">*</span></label>
                    <input type="text" name="address" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Zip Code<span class="text-yellow-600">*</span></label>
                    <input type="text" name="zip_code" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Town/City<span class="text-yellow-600">*</span></label>
                    <input type="text" name="city" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Country/Region<span class="text-yellow-600">*</span></label>
                    <input type="text" name="country" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Phone number<span class="text-yellow-600">*</span></label>
                    <input type="text" name="phone" class="input-box">
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-2 block">Email address<span class="text-yellow-600">*</span></label>
                    <input type="text" name="email" class="input-box">
                </div>
            </div>
        </div>
        <!-- checkout form end -->

        <!-- sidebar -->
        <div class="col-span-4 border border-gray-200 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <div>
                        <h5 class="text-gray-800 font-medium">Module:</h5>
                        <p class="text-sm text-gray-600">Platform: </p>
                    </div>
                    <p class="text-gray-600">
                        x1
                    </p>
                    <p class="text-gray-600">87€</p>
                </div>
            </div>
            <div class="flex justify-between border-b border-gray-200 text-gray-800 font-medium py-3 uppercase">
                <p>Subtotal</p>
                <p>87€</p>
            </div>
            <div class="flex justify-between border-b border-gray-200 text-gray-800 font-medium py-3 uppercase">
                <p>Shipping</p>
                <p>Free</p>
            </div>
            <div class="flex justify-between text-gray-800 font-medium py-3 uppercase">
                <p class="font-semibold">Total</p>
                <p>87€</p>
            </div>
            <div class="flex items-center mb-4 mt-2">
                <input id="agreement" type="checkbox" class="text-yellow-600 focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm">Agree to our <a href="#" class="text-primary">terms & conditions</a></label>
            </div>
            <a href="{{route('orders.stripe')}}" class="w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">
            Place order
            </a>
        </div>
    </div>
    <!-- checkout wrapper end -->

@endsection