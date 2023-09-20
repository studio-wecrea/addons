<!-- header -->
<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <!-- logo -->
        <a href="{{ route('/') }}">
            <img src="{{ url('/images/wecrea-addons-logo.png') }}" class="h-16 w-full" alt="">
        </a>


        <!-- searchbar -->

        <form>
            <div class="w-full max-w-xl relative flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg></button>
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class=" block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Modules..." required>
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-yellow-500 rounded-r-lg border border-yellow-700 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>



        <!-- icons -->
        <div class="flex items-center space-x-4">
            <a href="{{route('orders.wishlist')}}" class="text-center text-gray-700 hover:text-yellow-900 transition relative">
                <div class="text-2xl">
                    <i class="far fa-heart"></i>
                </div>
                <div class="text-xs leading-3">Wish List</div>
                <navbar-wishlist></navbar-wishlist>
            </a>
            <a href="{{route('modules.cart')}}" class="text-center text-gray-700 hover:text-yellow-900 transition relative">
                <div class="text-2xl">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="text-xs leading-3">Cart</div>
                <navbar-cart></navbar-cart>
            </a>
            <a href="{{route('customers.account')}}" class="text-center text-gray-700 hover:text-yellow-900 transition relative">
                <div class="text-2xl">
                    <i class="far fa-user"></i>
                </div>
                @if(Auth::guard('webcustomers')->check())
                <div class="text-xs leading-3">Hi, {{Auth::guard('webcustomers')->user()->firstname}}</div>
                @else
                <div class="text-xs leading-3">Account</div>
                @endif

            </a>
        </div>
    </div>
</header>
<!-- header end -->