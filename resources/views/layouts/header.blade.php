<!-- header -->
<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <!-- logo -->
        <a href="{{ route('/') }}">
            <img src="{{ url('/images/wecrea-addons-logo.png') }}" class="h-16 w-full" alt="">
        </a>


        <!-- searchbar -->

        <form action="/modules/search" method="GET">
            <div id="searchBtn" class="hidden md:block w-full max-w-xl relative flex">
                
                <div class="relative w-full">
                    <input type="text" name="text" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-1 border border-yellow-700 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-gray-500" placeholder="Search Modules..." required>
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
        <div class="hidden md:flex items-center space-x-4">
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
            <div onclick="toggleAccount()" class="cursor-pointer relative ">
            <a href="#" class="text-center text-gray-700 hover:text-yellow-900 transition relative">
                <div class="text-2xl">
                    <i class="far fa-user"></i>
                </div>
                @if(Auth::guard('webcustomers')->check())
                <div class="text-xs leading-3">Hi, {{Auth::guard('webcustomers')->user()->firstname}}</div>
                @else
                <div class="text-xs leading-3">Account</div>
                @endif
                
            </a>
            <div id="dropdown-profile" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition duration-300 cursor-pointer" style="display:none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            @if(Auth::guard('webcustomers')->check())
                <a href="{{route('customers.account')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                </form>
            @else
                <a href="{{route('login')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign in</a>
            @endif
          </div>
            </div>
           
        </div>
        <div class="-mr-2 flex items-center md:hidden">
        <!-- Mobile menu button -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
</svg>

        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
</header>
<!-- header end -->
<script>

function toggleAccount() {
    const profileDropdown = document.getElementById('dropdown-profile');
    if (profileDropdown.style.display == "none") {
        profileDropdown.style.display = "block" ;
    } else {
        profileDropdown.style.display = "none" ;
    }
      
  }

</script>