@extends('layouts.app')

@section('content')

    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('images/banner2.jpg');">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                Les modules <br> les plus utilisés
            </h1>
            <p>
            Cupcake carrot cake cotton candy lemon drops gingerbread chupa chups. <br>Cupcake jelly cheesecake lemon drops pie apple pie ice cream.<br> Lollipop icing donut lemon drops marshmallow fruitcake shortbread.
            </p>
            <div class="mt-12">
                <a href="#" class="bg-yellow-500 border border-yellow-900 text-white px-8 py-3 font-medium rounded-md hover:bg-transparent hover:text-yellow-500 transition">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- feature section -->
    <div class="container mt-16">
        <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
            <!-- single feature -->
            <div class="border border-yellow-500 rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ url('/images/icons/icons8-téléchargements-100.png')}}" class="ml-6 w-12 h-12 text-yellow-500 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Téléchargement instantané</h4>
                    <p class="text-gray-500 text-sm">Rapide et efficace</p>
                </div>
            </div>
            <!-- single feature end -->
            <!-- single feature -->
            <div class="border border-yellow-500 rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ url('/images/icons/icons8-recevoir-le-changement-80.png')}}" class="ml-6 w-12 h-12 text-yellow-500 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Remboursement garanti</h4>
                    <p class="text-gray-500 text-sm">Sous 30 jours</p>
                </div>
            </div>
            <!-- single feature end -->
            <!-- single feature -->
            <div class="border border-yellow-500 rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ url('/images/icons/icons8-24-hours-day-support-100.png')}}" class="w-12 h-12 text-yellow-500 object-contain">
                <div class="mr-4">
                    <h4 class="font-medium capitalize text-lg">24/7 <br>Support</h4>
                    <p class="text-gray-500 text-sm">Support Client</p>
                </div>
            </div>
            <!-- single feature end -->
        </div>
    </div>
    <!-- feature section end -->

    <!-- modules -->
    <div class="container py-16">
        <h2 class="text-2xl font-roboto font-medium text-gray-800 uppercase mb-6">Most relevant modules</h2>

        <div class="grid grid-cols-3 gap-3">
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-1.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 1</a>
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-2.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 2</a>
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-3.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 3</a>
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-4.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 4</a>
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-5.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 5</a>
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="relative rounded-lg overflow-hidden group">
                <img src="{{ url('/images/modules/module-6.jpg')}}" class="w-full">
                <a href="#" class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-50 transition">Module 6</a>
            </div>
            <!-- single module end -->
        </div>
    </div>
    <!-- modules end -->

    <!-- modules wrapper -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">top new modules</h2>

        <!-- module grid -->
        <div class="grid grid-cols-4 gap-6">
            <!-- single module -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ url('/images/modules/module-1.jpg') }}" class="w-full">
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
                     <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-yellow-500 transition">Module 1</h4>
                     </a>
                     <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-lg text-yellow-900 font-semibold">45,00€</p>
                        <p class="text-sm text-gray-400 line-through">55,00€</p>
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
                <a href="#" class="block w-full py-1 text-center text-white bg-yellow-500 border border-yellow-500 rounded-b hover:bg-transparent hover:text-yellow-600 transition">Add to cart</a>
                <!-- module content end -->
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ url('/images/modules/module-2.jpg') }}" class="w-full">
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
                     <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-yellow-500 transition">Module 2</h4>
                     </a>
                     <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-lg text-yellow-900 font-semibold">65,00€</p>
                        <p class="text-sm text-gray-400 line-through">75,00€</p>
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
                <a href="#" class="block w-full py-1 text-center text-white bg-yellow-500 border border-yellow-500 rounded-b hover:bg-transparent hover:text-yellow-600 transition">Add to cart</a>
                <!-- module content end -->
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ url('/images/modules/module-3.jpg') }}" class="w-full">
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
                     <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-yellow-500 transition">Module 3</h4>
                     </a>
                     <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-lg text-yellow-900 font-semibold">55,00€</p>
                        <p class="text-sm text-gray-400 line-through">85,00€</p>
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
                <a href="#" class="block w-full py-1 text-center text-white bg-yellow-500 border border-yellow-500 rounded-b hover:bg-transparent hover:text-yellow-600 transition">Add to cart</a>
                <!-- module content end -->
            </div>
            <!-- single module end -->
            <!-- single module -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- module image -->
                <div class="relative">
                    <img src="{{ url('/images/modules/module-5.jpg') }}" class="w-full">
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
                     <a href="#">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-yellow-500 transition">Module 4</h4>
                     </a>
                     <div class="flex items-baseline mb-1 space-x-2 font-roboto">
                        <p class="text-lg text-yellow-900 font-semibold">75,00€</p>
                        <p class="text-sm text-gray-400 line-through">85,00€</p>
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
                <a href="#" class="block w-full py-1 text-center text-white bg-yellow-500 border border-yellow-500 rounded-b hover:bg-transparent hover:text-yellow-600 transition">Add to cart</a>
                <!-- module content end -->
            </div>
            <!-- single module end -->
        </div>
        <!-- module grid end -->
    </div>
    <!-- modules wrapper end -->

    <!-- ad section -->
    <div class="container pb-16">
        <a href="#">
            <img src="{{ url('/images/promo.jpg') }}" class="w-full h-64">
        </a>
    </div>
    <!-- ad section end -->

@endsection