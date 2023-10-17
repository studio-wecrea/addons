<template>
    <button class="text-sm border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:text-primary transition"
    v-on:click.prevent="addToWishlist">              
    <i class="fas fa-heart text-sm "></i>Wishlist
    </button>
</template>



<script setup>
    
    import useModuleWishlist from '../Composables/wishlist';
    import emitter from 'tiny-emitter/instance.js';
    import { createToaster } from "@meforma/vue-toaster";
    const toaster = createToaster({ /* options */ });


    const { add } = useModuleWishlist();

    const moduleId = defineProps(['moduleId']);

    const addToWishlist = async() => {
            let wishlistCount = await add(moduleId);
            console.log(moduleId);
            emitter.emit('wishlistCountUpdated', wishlistCount);
            toaster.success('Module added to wishlist!');
    }

</script>
