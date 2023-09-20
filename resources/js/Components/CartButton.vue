<template>
   <div v-for="module in modules" :key="module.id">
   <button v-on:click.prevent="addToCart(module.id)" class="text-sm px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Add to cart</button>
   </div>
    <button v-on:click.prevent="addToCart(module.id)" class="text-sm px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Add to cart</button>


</template>

<script setup>

import useModule from '../Composables/modules';
import emitter from 'tiny-emitter/instance.js';
import { createToaster } from "@meforma/vue-toaster";
import useModuleWishlist from '../Composables/wishlist';

const { modules } = useModuleWishlist();
    
const toaster = createToaster({ /* options */ });

const { add } = useModule();

const addToCart = async(moduleId) => {
        
        let cartCount = await add(moduleId);
        emitter.emit('cartCountUpdated', cartCount);
        toaster.success('Module ajouté au panier!');

}

</script>