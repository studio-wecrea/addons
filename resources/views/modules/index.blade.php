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
        <p class="text-sm text-gray-600 font-medium">Shop</p>
    </div>
    <!-- breadcrums end -->

    <!-- shop wrapper -->
    <div class="container grid grid-cols-4 gap-6">
        <!-- sidebar -->
        <cart-sidebar></cart-sidebar>
        <!-- sidebar end -->

        <!-- module -->
        <div class="col-span-3 mb-10">
            <!-- sorting -->
            <div class="flex items-center mb-4">
            <select class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-yellow-500 focus:border-yellow-500">
                <option>Default sorting</option>
                <option>Price low-high</option>
                <option>Price high-low</option>
                <option>Latest modules</option>
            </select>

            <div class="flex gap-2 ml-auto">
                <div id="gridBtn" class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-yellow-500 rounded cursor-pointer">
                    <i class="fas fa-th"></i>
                </div>
                <div id="listBtn" class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            </div>
            
            <!-- sorting end -->
            <!-- module grid -->
        <div id="gridPanel" class="active grid grid-cols-3 gap-6">
            <!-- single module -->
            @foreach($modules as $module)
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ $module->image }}" class="object-cover h-72 w-72">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100">
                        <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-gray-800 transition">
                            <i class="fas fa-search"></i>
                        </a>
                        <heart-to-wishlist :module-id="{{ $module->id }}" class="bg-yellow-500"></heart-to-wishlist>
                    </div>
                </div>
                <!-- module image end -->

                <!-- module content -->
                <div class="pt-4 pb-3 px-4">
                    <a href="{{ route('modules.show', $module->id )}}">
                        <h4 class="uppercase font-medium text-md mb-2 text-gray-800 hover:text-yellow-500 transition">{{$module->name}}</h4>
                    </a>
                    <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-md text-yellow-900 font-semibold">{{$module->price}}€</p>
                        <p class="text-sm text-gray-400 line-through">{{$module->original_price}}€</p>
                    </div>
                    <div class="flex items-center">
                        <div class="flex gap-1 text-sm text-yellow-400">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="text-xs text-gray-500 ml-3">(150)</div>
                    </div>
                </div>
                <add-to-cart :module-id="{{ $module->id }}"></add-to-cart>
                <!-- module content end -->
               
            </div>
            <!-- single module end -->
            @endforeach
        </div>
        <!-- module grid end -->
        <!-- module list -->
        
     
        <!-- wishlist start -->
         
    <div id="listPanel" class="hidden active col-span-9 space-y-4">
       

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
                <a href="{{ route('modules.show', $module->id )}}">
                <h2 class="text-md text-gray-800 font-medium uppercase hover:text-yellow-500 transition"> {{$module->name}}
                </h2>
                </a>
                <p class="text-sm text-gray-500 text-sm">
                Platform:
                    <span class="text-sm text-yellow-600">{{$module->platform_id}}</span>
                
                </p>
            </div>
            
            <!-- wishlist content end -->

            <div class="text-md text-primary font-semibold">{{$module->price}} €</div>
           
            <list-btn-add-to-cart :module-id="{{ $module->id }}"></list-btn-add-to-cart>
            <heart-to-wishlist :module-id="{{ $module->id }}" class="text-yellow-500 border-yellow-500 bg-white hover:bg-white hover:text-gray-600"></heart-to-wishlist>
            <div class="text-sm text-gray-600 cursor-pointer hover:text-primary mr-6">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single wishlist end -->
        @endforeach
    
    </div>
        <!-- module list end -->
        </div>
        <!-- module end -->
    </div>
    <!-- shop wrapper end -->


@endsection