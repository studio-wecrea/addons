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
        <p class="text-gray-600 font-medium">Account</p>
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
                @if(!empty($customer))
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
                <a href="#" class="text-sm relative text-yellow-600 block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-sm">
                        <i class="far fa-address-card"></i>
                    </span>
                    Manage account
                </a>
                <a href="{{route('customers.profile-edit')}}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Profile info
                </a>
                <a href="{{route('customers.address')}}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
                    Manage address
                </a>
                <a href="{{route('customers.password')}}" class="text-sm relative hover:text-yellow-600 block capitalize transition">
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
                <a href="{{route('orders.wishlist')}}" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
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
    
    <!-- Profile info -->
    <div class="col-span-9 grid grid-cols-3 gap-4">
        <!-- single card -->
        @if(!empty($customer))
        <div class="shadow rounded bg-white px-4 pt-6 pb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-lg">Personal profile</h3>
                <a href="#" class="text-yellow-600">Edit</a>
            </div>
            <div class="space-y-1">
                <h4 class="text-gray-700 font-medium">{{$customer->lastname}} {{$customer->firstname}}</h4>
                <p class="text-gray-800 text-sm">{{$customer->email}}</p>
                <p class="text-gray-800 text-sm">{{$customer->phone}}</p>
            </div>
        </div>
        <!-- single card end -->
        <!-- single card -->
        <div class="shadow rounded bg-white px-4 pt-6 pb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-lg">Shipping Address</h3>
                <a href="#" class="text-yellow-600">Edit</a>
            </div>
            <div class="space-y-1">
                <h4 class="text-gray-700 font-medium">{{$customer->lastname}} {{$customer->firstname}}</h4>
                <p class="text-gray-800 text-sm">{{$customer->address}}</p>
                <p class="text-gray-800 text-sm">{{$customer->phone}}</p>
            </div>
        </div>
        <!-- single card end -->
        <!-- single card -->
        <div class="shadow rounded bg-white px-4 pt-6 pb-8">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-medium text-gray-800 text-lg">Billing Address</h3>
                <a href="#" class="text-yellow-600">Edit</a>
            </div>
            <div class="space-y-1">
                <h4 class="text-gray-700 font-medium">{{$customer->lastname}} {{$customer->firstname}}</h4>
                <p class="text-gray-800 text-sm">{{$customer->address}}</p>
                <p class="text-gray-800 text-sm">{{$customer->phone}}</p>
            </div>
        </div>
        @endif
        <!-- single card end -->
        
    </div>
    <!-- Profileinfo end -->
   
    </div>
 
    <!-- Account wrapper end -->

@endsection