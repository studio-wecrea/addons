  <!-- navbar -->
  <nav class="hidden md:block bg-yellow-900">
        <div class="container flex">
            <!-- all category -->
            <div class="px-16 py-4 bg-yellow-500 flex items-center cursor-pointer relative group">
                <span class="text-white">
                    <i class="fas fa-bars"></i>
                </span>
                <span class="capitalize ml-2 text-white text-sm">All Categories</span>
                <div class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-ordinateur-portable-24.png') }}" class="w-5 h-5 object-contain" alt="logode categories">
                        <span class="ml-6 text-gray-600 text-sm">Design & Navigation</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-chercher-24.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Trafic & Marketplaces</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-ventes-totales-24.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Promos & Marketing</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-google-docs-30.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Fiche produit</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-carte-bancaire-face-arrière-24.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Paiement</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-notepad-64.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Administration</span>
                    </a>
                    <!-- single category end-->
                    <!-- single category -->
                    <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                        <img src="{{ url('/images/icons/icons8-centre-direction-30.png') }}" class="w-5 h-5 object-contain">
                        <span class="ml-6 text-gray-600 text-sm">Spécialisations</span>
                    </a>
                    <!-- single category end-->
                </div>
            </div>
            <!-- all category end -->
            <!-- navbar links -->
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 capitalize">
                    <a href="{{ route('/') }}" class="text-sm text-gray-200 hover:text-white transition">Home</a>
                    <a href="{{ route('modules.index') }}" class="text-sm text-gray-200 hover:text-white transition">Shop</a>
                    <a href="https://wecrea.com/le-studio/" class="text-sm text-gray-200 hover:text-white transition">About us</a>
                    <a href="{{ route('contact.index') }}" class="text-sm text-gray-200 hover:text-white transition">Contact us</a>
                </div>
                <!-- @if(Auth::guard('webcustomers')->check())
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-gray-200 hover:text-white transition">Logout <i class="fa fa-sign-out ml-2 "></i></a>
                </form>
                @else
                <a href="{{route('login')}}" class="text-sm text-gray-200 hover:text-white transition">Login/Register</a>
                @endif -->
            </div>
        </div>
    </nav>
    <!-- navbar end -->