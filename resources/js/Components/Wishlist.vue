<template>
        <!-- single wishlist -->
        <div v-for="module in modules" :key="module.id" class="flex items-center justify-between gap-p p-4 border border-gray-200 rounded">
            <!-- wishlist image -->
            <div class="w-28 flex-shrink-0 ml-4">
                <img :src="module.associatedModel.image" class="h-28 w-28 object-cover rounded">
            </div>
            <!-- wishlist image end -->

            <!-- wishlist content -->
            <div class="w-1/3">
                <h2 class="text-md text-gray-800 font-medium uppercase" v-text="module.name">
                </h2>
                <p class="text-sm text-gray-500 text-sm">
                Platform:
                    <span class="text-sm text-yellow-600" v-text="module.associatedModel.platform_id"></span>
                
                </p>
            </div>
            
            <!-- wishlist content end -->

            <div class="text-md text-primary font-semibold">{{ module.associatedModel.price }} €</div>
            <button v-on:click.prevent="addToCart(module.id)" class="text-sm px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Add to cart</button>
            <div v-on:click.prevent="destroy(module.id)" class="text-sm text-gray-600 cursor-pointer hover:text-primary mr-6">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single wishlist end -->
    


</template>

<script setup>


import useModule from '../Composables/modules';
import { onMounted, computed } from 'vue';
import emitter from 'tiny-emitter/instance.js';
import useModuleWishlist from '../Composables/wishlist';
import { createToaster } from "@meforma/vue-toaster";
    
const toaster = createToaster({ /* options */ });

const {
    modules,
    getModules,
    destroyModule,
    wishlistCount
    
} = useModuleWishlist()

const { add } = useModule();


const addToCart = async(moduleId) => {
        
            let cartCount = await add(moduleId);
            emitter.emit('cartCountUpdated', cartCount);
            toaster.success('Module ajouté au panier!');

    }

const cartTotal = computed(() => {
    let price = Object.values(modules.value).reduce((acc, module) => acc += module.associatedModel.price * module.quantity, 0);
    return price;
});


const destroy = async(id) => {
    await destroyModule(id);
    await getModules();
    emitter.emit('wishlistCountUpdated', wishlistCount.value)
}


onMounted(async() => {
    await getModules();
})

</script>
