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

    <div class="container">
        <p>Payment Cancelled!</p>
    </div>

@endsection