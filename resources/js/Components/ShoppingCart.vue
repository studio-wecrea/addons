<template>
         <!-- checkout wrapper -->
    <div class="container grid grid-cols-12 gap-6 items-start pb-16 pt-4">
        
        <!-- checkout form -->
        <div class="col-span-8 space-y-4">
        
            <div class="w-full grid grid-cols-9 bg-gray-100 border border-gray-200 py-2 px-10 rounded">
                <div class="col-span-7"><h5 class=" text-gray-800 font-medium">Product</h5></div>
                <div class="col-span-2"><h5 class="text-gray-800 font-medium">Total</h5></div>
                
                
            </div>
        

        <div class="space-y-4">
    
        <!-- single cart item -->
        <div v-for="module in modules" :key="module.id" class="grid grid-cols-9 flex items-center justify-between gap-p py-4 pl-8 pr-10 border border-gray-200 rounded">
            <!-- cart item image -->
            <div class="col-span-2 w-28 flex-shrink-0">
                <img :src="module.associatedModel.image" class="h-28 w-28 object-cover rounded">
            </div>
            <!-- cart item image end -->

            <!-- cart item content -->
            <div  class="col-span-5">
                <h2 class="text-gray-800 text-xl font-medium uppercase" v-text="module.name"> 
                </h2>
                <p class="text-gray-500 text-sm">
                Platform:
                    
                    <span class="text-yellow-600" v-text="module.associatedModel.platform_id"></span>
                    
                </p>
            </div>
            
            <!-- cart item content end -->

            <div class="col-span-1 text-primary text-lg font-semibold">{{ module.associatedModel.price }} €</div>
            
            <div v-on:click.prevent="destroy(module.id)" class="col-span-1 text-right text-gray-600 cursor-pointer hover:text-primary">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single cart item end -->
        
        </div>
        </div>
        <!-- checkout form end -->


        <!-- sidebar -->
        <div class="col-span-4 border border-gray-200 p-8 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">order summary</h4>
            <div class="space-y-2">
                <div v-for="module in modules" :key="module.id" class="flex justify-between">
                    <div>
                        <h5  class="text-gray-800 font-medium">{{module.name}}</h5>
                    </div>
                    <p class="text-gray-600">
                        x {{module.quantity}}
                    </p>
                    <p class="text-gray-600">{{module.associatedModel.price}} €</p>
                </div>
            </div>
            <div class="flex justify-between border-b border-gray-200 text-gray-800 font-medium py-3 uppercase">
                <p>Subtotal</p>
                <p>{{cartTotal}} €</p>
            </div>
            <div class="flex justify-between border-b border-gray-200 text-gray-800 font-medium py-3 uppercase">
                <p>Shipping</p>
                <p>Free</p>
            </div>
            <div class="flex justify-between text-gray-800 font-medium py-3 uppercase">
                <p class="font-semibold">Total</p>
                <p>{{cartTotal}} €</p>
            </div>
            <div class="flex items-center mb-4 mt-2">
                <input id="agreement" type="checkbox" class="text-yellow-600 focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="agreement" class="mt-4 mb-4 text-gray-600 ml-3 cursor-pointer text-sm">Agree to our <a href="#" class="text-primary">terms & conditions</a></label>
            </div>
            <div class="relative w-full mb-4">
            <input class="h-12 w-full block bg-white border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition" placeholder="Coupon">
            <button type="submit" class="h-12 absolute  top-0 right-0 px-4 py-3 text-sm font-medium text-white bg-yellow-500 rounded-r-md border border-yellow-700 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-900 dark:bg-yellow-900 dark:hover:bg-yellow-900 dark:focus:ring-yellow-900">
                            <p class="w-full" >
                                Apply
                            </p>
                            <span class="sr-only">Search</span>
                        </button>
            </div>
            
                
                <a href="/stripe/checkout" type="submit" class="uppercase w-full block text-center bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md hover:bg-transparent hover:text-primary transition">
            Process to checkout
            </a>
           
        </div>
    </div>
    <!-- checkout wrapper end -->
</template>

<script setup>

import useModule from '../Composables/modules';
import { onMounted, computed } from 'vue';
import emitter from 'tiny-emitter/instance.js';

const {
    modules,
    getModules,
    destroyModule,
    cartCount
    
} = useModule()

const cartTotal = computed(() => {
    let price = Object.values(modules.value).reduce((acc, module) => acc += module.associatedModel.price * module.quantity, 0);

    return price;
});

const destroy = async(id) => {
    await destroyModule(id);
    await getModules();
    emitter.emit('cartCountUpdated', cartCount.value)
}


onMounted(async() => {
    await getModules();
})
</script>