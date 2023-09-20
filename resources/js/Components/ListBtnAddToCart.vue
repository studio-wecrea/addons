<template>
    <button class="text-sm px-6 py-2 text-center text-sm text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium" v-on:click.prevent="addToCart">Add to cart</button>
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