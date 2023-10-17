<template>
<div v-for="module in modules" :key="module.id">
    <div v-on:click.prevent="destroy(module.id)" class="text-sm text-gray-600 cursor-pointer hover:text-primary mr-6">
        <i class="fas fa-trash"></i>
    </div>
</div>
  

</template>

<script setup>
import useModuleWishlist from '../Composables/wishlist';
import emitter from 'tiny-emitter/instance.js';
import { onMounted, computed } from 'vue';

const {
    modules,
    getModules,
    destroyModule,
    wishlistCount
    
} = useModuleWishlist()


const destroy = async(id) => {
    await destroyModule(id);
    await getModules();
    emitter.emit('wishlistCountUpdated', wishlistCount.value)
}

onMounted(async() => {
    await getModules();
})
</script>

