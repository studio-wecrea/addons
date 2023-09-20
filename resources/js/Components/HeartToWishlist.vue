<template>
    <button class="text-white text-lg w-9 h-8 rounded-full flex items-center justify-center hover:bg-gray-800 transition"  v-on:click.prevent="addToWishlist">
                            <i class="fas fa-heart"></i>
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