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
        <p class="text-sm text-gray-600 font-medium">Module view</p>
    </div>
    <!-- breadcrums end -->

    <!-- module view-->
    <div class="container grid grid-cols-2 gap-8">
        <!-- module image -->
        <div>
            <img src="{{ url('/images/modules/module-1.jpg') }}" class="w-full h-50 rounded">
        </div>
        <!-- module image end -->

        <!-- module content -->
        <div>
            <h2 class="text-xl font-medium uppercase mb-2">{{$module->name}}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
                <div class="text-xs text-gray-500 ml-3">(150 Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="space-x-2">
                    <span class="text-sm text-gray-800 font-semibold ">Platform:</span>
                    @foreach($platforms as $platform)
                    @if($module->platform_id === $platform->id)
                    <span class="text-sm text-gray-600">{{$platform->name}}</span>
                    @endif
                    @endforeach
                    
                </p>
                <p class="space-x-2">
                    <span class="text-sm text-gray-800 font-semibold">Category:</span>
                    @foreach($module->categories as $mod)
                    <span class="text-sm text-gray-600">{{$mod->name}}</span>
                    @endforeach
                </p>
                <p class="space-x-2">
                    <span class="text-sm text-gray-800 font-semibold">Compatibility:</span>
                    <span class="text-sm text-gray-600">8.0.0</span>
                </p>
            </div>
            <div class="flex items-baseline mb-1 space-x-2 font-roboto mt-4">
                <p class="text-lg text-yellow-600 font-semibold">{{$module->price}}€</p>
                <p class="text-base text-gray-400 line-through">{{$module->original_price}}€</p>
            </div>
            <p class="mt-4 text-sm text-gray-600">
            {{$module->description}}
            </p>
            <!-- cart button -->
            <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6">
                <button-add-to-cart :module-id="{{ $module->id }}"></button-add-to-cart>
                <add-to-wishlist :module-id="{{ $module->id }}"></add-to-wishlist>
            </div>
            <!-- cart button end -->

            <!-- social share -->
            <div class="flex gap-3 mt-4">
                <a href="#" class="text-sm text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-sm text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-sm text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- social share end -->
        </div>
        <!-- module content end -->
    </div>

    <!-- module view end -->
    <div class=" container pb-16">
    <div class="sm:hidden">
                <label for="tabSelect" class="sr-only">Select a tab</label>
                <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                <select id="tabSelect" name="tabSelect" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base  sm:text-sm">
                  <option value="reviews" selected>Reviews</option>
                  <option value="faq">FAQ</option>
                  <option value="license">Licence</option>
                </select>
              </div>
        <div class="border-b border-gray-200 mb-4">
            
            <nav class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
              <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
            
              <a href="javascript:void(0)" data-tab="reviews" class="tab-link border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-reviews" role="tab" >Customer Reviews</a>
              <a href="javascript:void(0)" data-tab="faq" class="tab-link border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-faq" role="tab">FAQ</a>
              <a href="javascript:void(0)" data-tab="license" class="tab-link border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300 whitespace-nowrap border-b-2 py-6 text-sm font-medium" aria-controls="tab-panel-license" role="tab" >License</a>
              
            </nav>
        </div>
         <!-- 'Customer Reviews' panel, show/hide based on tab state -->
         <div id="tab-panel-reviews" class="-mb-10 tab-content" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0" data-tab-content="reviews">
            <h3 class="sr-only">Customer Reviews</h3>

            <div class="flex space-x-4 text-sm text-gray-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
              </div>
              <div class="flex-1 py-10">
                <h3 class="font-medium text-gray-900">Emily Selman</h3>
                <p><time datetime="2021-07-16">July 16, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-gray-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-gray-500">
                  <p>This icon pack is just what I need for my latest project. There's an icon for just about anything I could ever need. Love the playful look!</p>
                </div>
              </div>
            </div>

            <div class="flex space-x-4 text-sm text-gray-500">
              <div class="flex-none py-10">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
              </div>
              <div class="flex-1 py-10 border-t border-gray-200">
                <h3 class="font-medium text-gray-900">Hector Gibbons</h3>
                <p><time datetime="2021-07-12">July 12, 2021</time></p>

                <div class="mt-4 flex items-center">
                  <!--
                    Heroicon name: mini/star

                    Active: "text-yellow-400", Default: "text-gray-300"
                  -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>

                  <!-- Heroicon name: mini/star -->
                  <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="sr-only">5 out of 5 stars</p>

                <div class="prose prose-sm mt-4 max-w-none text-gray-500">
                  <p>Blown away by how polished this icon pack is. Everything looks so consistent and each SVG is optimized out of the box so I can use it directly with confidence. It would take me several hours to create a single icon this good, so it's a steal at this price.</p>
                </div>
              </div>
            </div>

            <!-- More reviews... -->
          </div>

          <!-- 'FAQ' panel, show/hide based on tab state -->
          <div id="tab-panel-faq" class="text-sm text-gray-500 tab-content hidden active" aria-labelledby="tab-faq" role="tabpanel" tabindex="0" data-tab-content="faq">
            <h3 class="sr-only">Frequently Asked Questions</h3>

            <dl>
              <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
              <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
                <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
              </dd>

              <dt class="mt-10 font-medium text-gray-900">Can I use the icons at different sizes?</dt>
              <dd class="prose prose-sm mt-2 max-w-none text-gray-500">
                <p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or larger than 64 x 64 to retain legibility and visual balance.</p>
              </dd>

              <!-- More FAQs... -->
            </dl>
          </div>

          <!-- 'License' panel, show/hide based on tab state -->
          <div id="tab-panel-license" class="pt-10 tab-content hidden active" aria-labelledby="tab-license" role="tabpanel" tabindex="0" data-tab-content="license">
            <h3 class="sr-only">License</h3>

            <div class="prose prose-sm max-w-none text-gray-500">
              <h4>Overview</h4>

              <p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>

              <ul role="list">
                <li>You're allowed to use the icons in unlimited projects.</li>
                <li>Attribution is not required to use the icons.</li>
              </ul>

              <h4>What you can do with it</h4>

              <ul role="list">
                <li>Use them freely in your personal and professional work.</li>
                <li>Make them your own. Change the colors to suit your project or brand.</li>
              </ul>

              <h4>What you can't do with it</h4>

              <ul role="list">
                <li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>
                <li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
        
    </div>
    <!-- module view details -->

    <!-- module view details end -->


@endsection