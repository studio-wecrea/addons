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
                    <h3 class="text-md text-gray-800 mt-4 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" name="categories[]" id="categories" onchange="sub()" value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }} class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="categories" class="text-sm text-gray-600 ml-3 cursor-pointer">{{ $category->name }}</label>
                            <div class="ml-auto text-gray-600 text-sm">({{$category->modules_count}})</div>

                        </div>
                        <!-- single category end -->
                        @endforeach

                    </div>
                </div>

                <!-- category filter end -->

                <!-- price filter -->
                <div class="pt-4">
                    <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">price</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text" name="minprice" value="" oninput="checkInputs()" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text" name="maxprice" value="" oninput="checkInputs()" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
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
                        @foreach($platforms as $platform)
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" name="platforms[]" id="platforms" onchange="sub()" value="{{ $platform->id }}" {{ in_array($platform->id, $selectedPlatforms) ? 'checked' : '' }} class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="platforms" class="text-sm text-gray-600 ml-3 cursor-pointer">{{$platform->name}}</label>
                        </div>
                        <!-- single platform end -->
                        @endforeach

                    </div>
                </div>
            </form>
            <!-- platform filter end -->
        </div>
    </div>
    <!-- sidebar end -->

    <!-- mobile filter sidebar -->

    <!--
      Mobile filter dialog

      Off-canvas filters for mobile, show/hide based on off-canvas filters state.
    -->
    <div id="mobile-filters" style="display:none" class="relative z-40 sm:hidden" role="dialog" aria-modal="true">

        <div class="sm:hidden fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">

            <div class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button onclick="closeFilterModal()" type="button" class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Filters -->
                <form class="mt-4 border-t border-gray-200">
                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-1" aria-expanded="false">
                                <span class="font-medium text-gray-900">Category</span>
                                <span class="ml-6 flex items-center">
                                    <!-- Expand icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                    <!-- Collapse icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <!-- Filter section, show/hide based on section state. -->
                        <div class="pt-6" id="filter-section-mobile-1">
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-0" name="category[]" value="new-arrivals" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-0" class="ml-3 min-w-0 flex-1 text-gray-500">Design & Network</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-1" name="category[]" value="sale" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-1" class="ml-3 min-w-0 flex-1 text-gray-500">Trafic & Marketplace</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-2" name="category[]" value="travel" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-2" class="ml-3 min-w-0 flex-1 text-gray-500">Promo & Marketing</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-3" name="category[]" value="organization" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-3" class="ml-3 min-w-0 flex-1 text-gray-500">Fiche produit</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Paiement</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Administration</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-category-4" name="category[]" value="accessories" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-category-4" class="ml-3 min-w-0 flex-1 text-gray-500">Spécialisations</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-0" aria-expanded="false">
                                <span class="font-medium text-gray-900">Price</span>
                                <span class="ml-6 flex items-center">
                                    <!-- Expand icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                    <!-- Collapse icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <!-- Filter section, show/hide based on section state. -->
                        <div class="pt-6" id="filter-section-mobile-0">
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <input id="filter-mobile-color-0" name="color[]" value="white" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-color-0" class="ml-3 min-w-0 flex-1 text-gray-500">$0 - $25</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-color-1" name="color[]" value="beige" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-color-1" class="ml-3 min-w-0 flex-1 text-gray-500">$25 - $50</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-color-2" name="color[]" value="blue" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-color-2" class="ml-3 min-w-0 flex-1 text-gray-500">$50 - $75</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-color-3" name="color[]" value="brown" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-color-3" class="ml-3 min-w-0 flex-1 text-gray-500">$75+</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-6">
                        <h3 class="-mx-2 -my-3 flow-root">
                            <!-- Expand/collapse section button -->
                            <button type="button" class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500" aria-controls="filter-section-mobile-2" aria-expanded="false">
                                <span class="font-medium text-gray-900">Plateforms</span>
                                <span class="ml-6 flex items-center">
                                    <!-- Expand icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                    <!-- Collapse icon, show/hide based on section open state. -->
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </h3>
                        <!-- Filter section, show/hide based on section state. -->
                        <div class="pt-6" id="filter-section-mobile-2">
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <input id="filter-mobile-size-0" name="size[]" value="2l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-size-0" class="ml-3 min-w-0 flex-1 text-gray-500">Prestashop</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="filter-mobile-size-1" name="size[]" value="6l" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <label for="filter-mobile-size-1" class="ml-3 min-w-0 flex-1 text-gray-500">Wordpress</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

                function toggleFilterMobile() {
                    const mobileFilters = document.getElementById('mobile-filters');
                    if (mobileFilters.style.display == "none") {
                        mobileFilters.style.display = "block";
                    } else {
                        mobileFilters.style.display = "none";
                    }
                }

                function closeFilterModal() {
                    const mobileFilters = document.getElementById('mobile-filters');
                    if (mobileFilters.style.display == "block") {
                        mobileFilters.style.display = "none";
                    }
                }

                function collapseCategoriesMobileFilter() {
                    const mobileCategoriesPanel = document.getElementById('');
                    if (mobileCategoriesPanel.style.display == "block") {
                        mobileCategoriesPanel.style.display == "none";
                    } else {
                        mobileCategoriesPanel.style.display == "none";
                    }
                }

                function openCategoriesMobileFilter() {
                    const mobileCategoriesPanel = document.getElementById('');
                    if (mobileCategoriesPanel.style.display == "none") {
                        mobileCategoriesPanel.style.display == "block";
                    } else {
                        mobileCategoriesPanel.style.display == "none";
                    }
                }

                function collapsePriceMobileFilter() {
                    const mobilePricePanel = document.getElementById('');
                    if (mobilePricePanel.style.display == "block") {
                        mobilePricePanel.style.display == "none";
                    } else {
                        mobilePricePanel.style.display == "none";
                    }
                }

                function openPriceMobileFilter() {
                    const mobileCategoriesPanel = document.getElementById('');
                    if (mobileCategoriesPanel.style.display == "none") {
                        mobileCategoriesPanel.style.display == "block";
                    } else {
                        mobileCategoriesPanel.style.display == "none";
                    }
                }

                function collapsePlatformMobileFilter() {
                    const mobilePlatformPanel = document.getElementById('');
                    if (mobilePlatformPanel.style.display == "block") {
                        mobilePlatformPanel.style.display == "none";
                    } else {
                        mobilePlatformPanel.style.display == "none";
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
                <div class="hidden md:block md:flex md:gap-2 md:ml-auto">
                    <div id="gridBtn" class=" border border-primary w-10 h-9 flex items-center justify-center text-white bg-yellow-500 rounded cursor-pointer">
                        <i class="fas fa-th"></i>
                    </div>
                    <div id="listBtn" class=" border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fas fa-list"></i>
                    </div>
                </div>

                <button onclick="toggleFilterMobile()" type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 md:hidden">
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
            @if(empty($filteredModules->all()))
            @foreach($modules as $module)

            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ $module->image }}" class="object-cover lg:h-32 lg:w-72">
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
            @endif
            @if(!empty($filteredModules))
            @foreach($filteredModules as $module)

            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ $module->image }}" class="object-cover lg:h-32 lg:w-72">
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
            @endif
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

            
            <!-- Pagination Example -->
            <ul class="pagination">
                <li><a href="?page=1">{{$filteredModules->links()}}</a></li>
                <li><a href="?page=2">2</a></li>
                <!-- Add more page links as needed -->
            </ul>

        </div>
        <!-- module list end -->
    </div>
    <!-- module end -->
</div>
<!-- shop wrapper end -->
<script>
    var delayTimer;

    function checkInputs() {
        clearTimeout(delayTimer); // Clear any existing timers

        delayTimer = setTimeout(function() {
            var minPrice = document.getElementsByName('minprice')[0].value;
            var maxPrice = document.getElementsByName('maxprice')[0].value;

            // Check if both inputs are filled
            if (minPrice !== '' && maxPrice !== '') {
                sub(); // Call the sub() function if both inputs are filled
            }
        }, 500); // Adjust the delay as needed (e.g., 500 milliseconds)
    }

    function sub() {
        form = document.getElementById('filter_cat').submit();
    }
</script>
@endsection