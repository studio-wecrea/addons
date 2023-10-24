@extends("layouts.app")
@section('content')

<div class="container bg-white">
    <div class="mx-auto max-w-3xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="max-w-xl">
            <h1 class="text-base font-medium text-primary">Thank you!</h1>
            <p class="mt-2 text-4xl font-bold tracking-tight sm:text-5xl">Your file is ready !</p>
            <p class="mt-2 text-base text-gray-500">Your order #14034056 is confirmed, you can now proceed to download.</p>

            <dl class="mt-12 text-sm font-medium">
                <dt class="text-gray-900">Order number</dt>
                <dd class="mt-2 text-primary">51547878755545848512</dd>
            </dl>
        </div>
      
        
        <div class="mt-10 border-t border-gray-200">
            <h2 class="sr-only">Your order</h2>

            <h3 class="sr-only">Items</h3>
            <div class="flex space-x-6 border-b border-gray-200 py-10">
                <img src="{{$module->image}}" alt="Glass bottle with black plastic pour top and mesh insert." class="h-20 w-20 flex-none rounded-lg bg-gray-100 object-cover object-center sm:h-40 sm:w-40">
                <div class="flex flex-auto flex-col">
                    <div>
                        <h4 class="font-medium text-gray-900">
                            <a href="#">{{$module->name}}</a>
                        </h4>
                        <p class="mt-2 text-sm text-gray-600">Chocolate fruitcake ice cream oat cake cheesecake wafer jelly shortbread jelly-o. Gummies ice cream chocolate marshmallow soufflé. Icing lemon drops pie pudding muffin apple pie marshmallow sesame snaps. Dessert tart shortbread marzipan fruitcake.</p>
                    </div>
                    <div class="mt-6 flex flex-1 items-end">
                        <dl class="flex space-x-4 divide-x divide-gray-200 text-sm sm:space-x-6">
                            <div class="flex">
                                <dt class="font-medium text-gray-900">Quantity</dt>
                                <dd class="ml-2 text-gray-700">1</dd>
                            </div>
                            <div class="flex pl-4 sm:pl-6">
                                <dt class="font-medium text-gray-900">Price</dt>
                                <dd class="ml-2 text-gray-700">{{$module->price}}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="sm:ml-40 sm:pl-6">
                <h3 class="sr-only">Your information</h3>
                
                <h4 class="sr-only">Addresses</h4>
                <dl class="grid grid-cols-2 gap-x-6 py-10 text-sm">
                    <div>
                        <dt class="font-medium text-gray-900">Shipping address</dt>
                        <dd class="mt-2 text-gray-700">
                            <address class="not-italic">
                                <span class="block">{{$customers->firstname}} {{$customers->lastname}}</span>
                                <span class="block">{{$customers->address}}</span>
                                <span class="block">{{$customers->postal_code}} {{$customers->city}}</span>
                                <span class="block">{{$customers->country}}</span>
                            </address>
                        </dd>
                    </div>
                    <div>
                        <dt class="font-medium text-gray-900">Billing address</dt>
                        <dd class="mt-2 text-gray-700">
                            <address class="not-italic">
                                <span class="block">{{$customers->firstname}} {{$customers->lastname}}</span>
                                <span class="block">{{$customers->address}}</span>
                                <span class="block">{{$customers->postal_code}} {{$customers->city}}</span>
                                <span class="block">{{$customers->country}}</span>
                            </address>
                        </dd>
                    </div>
                </dl>
               
                <h4 class="sr-only">Payment</h4>
                <dl class="grid grid-cols-2 gap-x-6 border-t border-gray-200 py-10 text-sm">
                    <div>
                        <a href="{{$module->file}}">
                        <dt class="font-medium text-gray-900">File to download</dt>
                        <dd class="mt-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                            </svg>
                            <p class="mt-2 text-gray-500 text-sm"> {{$module->name}}</p>

                        </dd>
                        </a>
                        
                    </div>
                    
                </dl>

                <h3 class="sr-only">Summary</h3>

                <dl class="space-y-6 border-t border-gray-200 pt-10 text-sm">
                    
                   
                    <div class="flex justify-between">
                        <dt class="font-medium text-gray-900">Total</dt>
                        <dd class="text-gray-900">{{$module->price}} €</dd>
                    </div>
                </dl>
            </div>
        </div>
        
       
    </div>
</div>


@endsection