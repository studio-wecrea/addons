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
        <p class="text-sm text-gray-600 font-medium">My Wishlist</p>
    </div>
    <!-- breadcrums end -->

    <!-- Account wrapper -->
    <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">
    <!-- sidebar -->
    <div class="col-span-3">
        <!-- account profile -->
        <div class="px-4 py-3 shadow flex items-center gap-4">
            <div class="flex-shrink-0">
                @if(isset($customer->image))
                <img src="{{$customer->image}}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                @else
                <img src="{{url('images/profile.png')}}" class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                @endif
            </div>
            <div class="flex-grow">
                <p class="text-sm text-gray-600">Hello,</p>
                @if (!empty($customer))
                <h4 class="text-sm text-gray-800 font-medium">
                    {{$customer->firstname}} {{$customer->lastname}}
                </h4>
                @endif
            </div>
        </div>
        <!-- account profile end -->

        <!-- profile links -->
        <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <!-- single link -->
            <div class="space-y-1 pl-8">
                <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="far fa-address-card"></i>
                    </span>
                    Manage account
                </a>
                <a href="{{route('customers.profile-edit')}}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Profile info
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Manage address
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Change password
                </a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="space-y-1 pl-8 pt-4">
                <a href="{{route('orders.history')}}" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="fa fa-gift"></i>
                    </span>
                    My Order History
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    My Returns
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    My Cancellations
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    My Reviews
                </a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="far fa-credit-card"></i>
                    </span>
                    Payment Methods
                </a>
                <a href="#" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Voucher
                </a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="space-y-1 pl-8 pt-4">
                <a href="{{route('orders.wishlist')}}" class="text-sm relative text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="far fa-heart"></i>
                    </span>
                    My Wishlist
                </a>
            </div>
            <!-- single link end -->
            <!-- single link -->
            <div class="space-y-1 pl-8 pt-4">
                <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="fa fa-sign-out"></i>
                    </span>
                    Logout
                </a>
            </div>
            <!-- single link end -->
        </div>
        <!-- profile links end -->
    </div>
    <!-- sidebar end -->

    <!-- wishlist -->
    <div class="col-span-9 space-y-4">
       <wishlist></wishlist>
        <!-- wishlist start -->
         
        <div class="col-span-9 space-y-4">
        <div class="py-4 flex items-center gap-3">
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-sm text-gray-600 font-medium">Wishlist</p>
        </div>

        @foreach($modules as $module)
        <!-- single wishlist -->
        <div class="flex items-center justify-between gap-p p-4 border border-gray-200 rounded">
            <!-- wishlist image -->
            <div class="w-28 flex-shrink-0 ml-4">
                <img src="{{ $module->image }}" class="h-28 w-28 object-cover rounded">
            </div>
            <!-- wishlist image end -->

            <!-- wishlist content -->
            <div class="w-1/3">
                <h2 class="text-md text-gray-800 font-medium uppercase"> {{$module->name}}
                </h2>
                <p class="text-sm text-gray-500 text-sm">
                Platform:
                    <span class="text-sm text-yellow-600">{{$module->platform_id}}</span>
                
                </p>
            </div>
            
            <!-- wishlist content end -->

            <div class="text-md text-primary font-semibold">{{$module->price}} €</div>
            <a href="#" class="text-sm px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Add to cart</a>
            <div class="text-sm text-gray-600 cursor-pointer hover:text-primary mr-6">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single wishlist end -->
        @endforeach
    
    </div>
    <!-- wishlist end -->
        
    </div>
    </div>
    <!-- wishlist end -->
   
    </div>
    <!-- Account wrapper end -->


   @endsection