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
        <div class="col-span-8 space-y-4">
            <div class="w-full grid grid-cols-4 bg-gray-100 border border-gray-200 py-2 px-6 rounded">
                <h5 class="ml-4 text-gray-800 font-medium w-1/4">Product</h5>
                <h5 class="text-gray-800 font-medium w-1/4"></h5>
                <h5 class="text-gray-800 font-medium w-1/4">Quantity</h5>
                <h5 class="ml-8 text-gray-800 font-medium w-1/4">Total</h5>
            </div>
        

        <div class="space-y-4">
        @foreach($modules as $module)
        <!-- single wishlist -->
        <div class="flex items-center justify-between gap-p p-4 border border-gray-200 rounded">
            <!-- wishlist image -->
            <div class="w-28 flex-shrink-0 ml-4">
                <img src="{{$module->image}}" class="w-full">
            </div>
            <!-- wishlist image end -->

            <!-- wishlist content -->
            <div class="w-1/2">
                <h2 class="text-gray-800 text-xl font-medium uppercase ">
                    {{$module->name}}
                </h2>
                <p class="text-gray-500 text-sm">
                Platform:
                    @foreach($platforms as $platform)
                    @if($module->platform_id === $platform->id)
                    <span class="text-yellow-600">{{$platform->name}}</span>
                    @endif
                    @endforeach
                </p>
            </div>
            
            <!-- wishlist content end -->

            <div class="text-primary text-lg font-semibold">{{$module->price}} €</div>
            
            <div class="text-gray-600 cursor-pointer hover:text-primary mr-6">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single wishlist end -->
        @endforeach
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
                <label for="agreement" class="mt-4 mb-4 text-gray-600 ml-3 cursor-pointer text-sm">Agree to our <a href="#" class="text-primary">terms & conditions</a></label>
            </div>
            <div class="relative w-full mb-4">
            <input class="w-full block bg-white border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition" placeholder="Coupon"></input>
            <button type="submit" class="absolute top-0 right-0 px-4 py-3 text-sm font-medium text-white bg-yellow-500 rounded-r-lg border border-yellow-700 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-900 dark:bg-yellow-900 dark:hover:bg-yellow-900 dark:focus:ring-yellow-900">
                            <p class="w-full" >
                                Apply
                            </p>
                            <span class="sr-only">Search</span>
                        </button>
            </div>
            
            <a href="{{route('orders.shopping-cart')}}" class="uppercase w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">
            Process to checkout
            </a>
        </div>
    </div>
    <!-- checkout wrapper end -->
@endsection