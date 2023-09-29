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
<div class="container grid grid-cols-1 md:grid-cols-4 gap-6">
    <!-- sidebar -->

    <div class="hidden md:block col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden mb-10">
        <div class="divide-y divide-gray-200 space-y-5">
            <!-- category filter -->
            <form method="GET" id="filter_cat" action="{{ route('modules.index')}}">
                <div>
                    <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" name="categories[]" id="cat-1" onclick="sub()" value="1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Design & Network</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" name="categories[]" onclick="sub()" value="2" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Trafic & Marketplace</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" name="categories[]" onclick="sub()" value="3" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Promo & Marketing</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" name="categories[]" onclick="sub()" value="4" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Fiche produit</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" name="categories[]" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Paiement</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" name="categories[]" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
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
                        <input type="text" name="minprice" value="" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text" name="maxprice" value="" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
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
                            <input type="checkbox" name="wordpress" id="wordpress" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="wordpress" class="text-sm text-gray-600 ml-3 cursor-pointer">Wordpress</label>
                        </div>
                        <!-- single platform end -->
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" name="prestashop" id="prestashop" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="prestashop" class="text-sm text-gray-600 ml-3 cursor-pointer">Prestashop</label>
                        </div>
                        <!-- single platform end -->
                    </div>
                </div>
            </form>
            <!-- platform filter end -->
        </div>
    </div>
    <!-- sidebar end -->

    <!-- mobile filter sidebar -->
    
    <!-- mobile filter sidebar end -->



    <!-- module -->
    <div class="col-span-3 mb-10">
        <!-- sorting -->
        <div class="flex items-center mb-4">
            <div class="md:hidden relative inline-block text-left">
                <div>
                    <button onclick="toggleSorting()" type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" aria-expanded="false" aria-haspopup="true">
                        Sort
                        <svg class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div id="sorting-panel" style="display:none" class="absolute left-0 z-10 mt-2 w-40 origin-top-left rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">
                        <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">Most Popular</a>
                        <a href="#" class="text-gray-500 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-1">Best Rating</a>
                        <a href="#" class="text-gray-500 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-2">Newest</a>
                    </div>
                </div>
            </div>
            <script>
                function toggleSorting() {
                    const sortingPanel = document.getElementById('sorting-panel');
                    if (sortingPanel.style.display == "none") {
                        sortingPanel.style.display = "block";
                    } else {
                        sortingPanel.style.display = "none";
                    }

                }
            </script>
            <select class="hidden md:block w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-yellow-500 focus:border-yellow-500">
                <option>Default sorting</option>
                <option>Price low-high</option>
                <option>Price high-low</option>
                <option>Latest modules</option>
            </select>

            <div class="flex gap-2 ml-auto">
                <div id="gridBtn" class="hidden md:block border border-primary w-10 h-9 flex items-center justify-center text-white bg-yellow-500 rounded cursor-pointer">
                    <i class="fas fa-th"></i>
                </div>
                <div id="listBtn" class="hidden md:block border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                    <i class="fas fa-list"></i>
                </div>
                <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                    <span class="sr-only">Filters</span>
                    <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- sorting end -->
        <!-- module grid -->
        <div id="gridPanel" class="active grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- single module -->

            @foreach($modules as $module)

            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ $module->image }}" class="object-cover lg:h-72 lg:w-72">
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

<script>
    function sub() {
        form = document.getElementById('filter_cat').submit();
    }
</script>
@endsection