<template>
    <button 
        class="block w-full py-1 text-sm text-center text-white bg-yellow-500 border border-yellow-500 rounded-b hover:bg-transparent hover:text-yellow-600 transition"
        v-on:click.prevent="addToCart"
        >Add to cart
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


// import {Store} from '../store/Store'

// export default {

//     computed: {

//         cart(){
//             return Store.$data.cart
//         },

//         totalModule(){
//             return this.$store.state.cart.reduce((acc, current) => acc + current.qty, 0)
//         },

//         totalPrice() {
//             return this.$store.state.cart.reduce((acc, current) => acc + current.price * current.qty, 0);
//         }
//     },
    
//     methods: {
//         removeFromCart(sku){
//             Store.removeFromCart(sku)
//         },

//         addToCart(product){
//             Store.addToCart(product);
//         }
//     }
// }
</script>