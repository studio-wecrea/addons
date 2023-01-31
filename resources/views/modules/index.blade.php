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
        <div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden mb-10">
            <div class="divide-y divide-gray-200 space-y-5">
                <!-- category filter -->
                <div>
                    <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Design & Network</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Trafic & Marketplace</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Promo & Marketing</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Fiche produit</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Paiement</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Administration</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Spécialisations</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                    </div>
                </div>
                <!-- category filter end -->
                <!-- category filter -->
                <div class="pt-4">
                    <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Design & Network</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Trafic & Marketplace</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Promo & Marketing</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Fiche produit</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Paiement</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Administration</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Spécialisations</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                    </div>
                </div>
                <!-- category filter end -->
                <!-- price filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">price</h3>
                <div class="mt-4 flex items-center">
                    <input type="text" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
                </div>
                </div>
                <!-- price filter end -->

                <!-- rating filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">Rating</h3>
                <div class="flex items-center gap-2">
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-1">
                        <label for="rating-1" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            1
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-2">
                        <label for="rating-2" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            2
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-3">
                        <label for="rating-3" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            3
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-4">
                        <label for="rating-4" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            4
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-5">
                        <label for="rating-5" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            5
                        </label>
                    </div>
                    <!-- single rating end -->
                </div>
                </div>
                <!-- rating filter end -->

                <!-- platform filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">platforms</h3>
                    <div class="space-y-2">
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Wordpress</label>
                        </div>
                        <!-- single platform end -->
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Prestashop</label>
                        </div>
                        <!-- single platform end -->
                    </div>
                </div>
                <!-- platform filter end -->
            </div>
        </div>
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
                <div class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-yellow-500 rounded cursor-pointer">
                    <i class="fas fa-th"></i>
                </div>
                <div class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fas fa-list"></i>
                </div>
            </div>
            </div>
            
            <!-- sorting end -->
            <!-- module grid -->
        <div class="grid grid-cols-3 gap-6">
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
                        <a href="#" class="text-white text-lg w-9 h-8 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-gray-800 transition">
                            <i class="fas fa-heart"></i>
                        </a>
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
        </div>
        <!-- module end -->
    </div>
    <!-- shop wrapper end -->


@endsection