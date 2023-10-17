<template>
    <button class="text-sm bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase flex items-center gap-2 hover:bg-transparent hover:text-primary transition" v-on:click.prevent="addToCart">
                    <i class="fas fa-shopping-bag text-sm "></i>Add to cart
                </button>
</template>

<script setup>

    import useModule from '../Composables/modules';
    import emitter from 'tiny-emitter/instance.js';
    import { createToaster } from "@meforma/vue-toaster";
    const toaster = createToaster({ /* options */ });


    const { add } = useModule();

    const moduleId = defineProps(['moduleId']);

    const addToCart = async() => {
        
            let cartCount = await add(moduleId);
            emitter.emit('cartCountUpdated', cartCount);
            toaster.success('Module ajouté au panier!');
            
    }

</script>