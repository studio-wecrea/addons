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

    @if(!empty($customer))
    <shopping-cart></shopping-cart>
    @else
        <div class="container mt-10 mb-10 grid grid-cols-2">
        <a href="{{route('login')}}" class="w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">Please Login</a>
        </div>
        
        @endif
@endsection