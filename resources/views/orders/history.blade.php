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
        <p class="text-sm text-gray-600 font-medium">My Order History</p>
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
                <a href="#" class="text-sm relative hover:text-yellow-600 block font-medium capitalize transition">
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
                <a href="{{route('orders.history')}}" class="text-sm relative text-yellow-600 block font-medium capitalize transition">
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
    

        <!--  old purchases -->
     <div class="col-span-9 space-y-4">
     <div class="py-4 flex items-center gap-3">
        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-sm text-gray-600 font-medium">Old Purchases</p>
    </div>

        @foreach($purchases as $purchase)
        <!-- single purchase -->
        <div class="flex items-center justify-between gap-p p-6 border border-gray-200 rounded">
            <h2 class="text-sm text-gray-800 font-medium uppercase">
                    {{$purchase->id}}
            </h2>
            <!-- order date -->
            <h2 class="text-sm text-gray-800 font-medium uppercase">
                    {{$purchase->created_at->format('Y-m-d')}}
            </h2>
            <!-- order date end -->

            <!-- purchase status -->
            <div class="w-1/3">
                <h2 class="text-sm text-gray-800 font-medium uppercase">
                    {{$purchase->status}}
                </h2>
    
            </div>
            
            <!-- purchase status end -->

            <div class="text-sm text-primary font-semibold">{{$purchase->total_price}} €</div>
            <a href="#" class="text-sm px-6 py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">View details</a>
            
        </div>
        <!-- single purchase end -->
        @endforeach
    
    </div>
    <!-- old purchases end -->
        
    </div>

     

</div>

@endsection