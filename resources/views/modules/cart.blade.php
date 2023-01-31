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
        @if(!empty($customer))
            <div class="w-full grid grid-cols-9 bg-gray-100 border border-gray-200 py-2 px-10 rounded">
                <div class="col-span-7"><h5 class=" text-gray-800 font-medium">Product</h5></div>
                <div class="col-span-2"><h5 class="text-gray-800 font-medium">Total</h5></div>
                
                
            </div>
        

        <div class="space-y-4">
    
        <shopping-cart></shopping-cart>
        
        </div>
        </div>
        <!-- checkout form end -->


        <!-- sidebar -->
        <div class="col-span-4 border border-gray-200 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
            <div class="space-y-2">
                <div class="flex justify-between">
                    <div>
                        <h5 class="text-gray-800 font-medium">Modules:</h5>
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
            <input class="h-12 w-full block bg-white border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition" placeholder="Coupon"></input>
            <button type="submit" class="h-12 absolute  top-0 right-0 px-4 py-3 text-sm font-medium text-white bg-yellow-500 rounded-r-md border border-yellow-700 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-900 dark:bg-yellow-900 dark:hover:bg-yellow-900 dark:focus:ring-yellow-900">
                            <p class="w-full" >
                                Apply
                            </p>
                            <span class="sr-only">Search</span>
                        </button>
            </div>
            <form action="{{route('modules.checkout')}}" method="POST">
                @csrf
                <button type="submit" class="uppercase w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">
            Process to checkout
            </button>
            </form>
            @else
        <div class="grid grid-cols-2">
        <a href="{{route('login')}}" class="w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">Please Login</a>
        </div>
        
        @endif
            
        </div>
       

    </div>
    <!-- checkout wrapper end -->
@endsection