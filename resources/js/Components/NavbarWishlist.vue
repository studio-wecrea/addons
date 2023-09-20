<template>
    <span class="absolute right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-red-500 text-white text-xs">{{ wishlistCount }}</span>
</template>

<script setup>

import { onMounted, ref } from 'vue';
import useModule from '../Composables/wishlist';
import emitter from 'tiny-emitter/instance.js';

const { getCount } = useModule();
const wishlistCount = ref(0);

emitter.on('wishlistCountUpdated', (count) => wishlistCount.value = count);

onMounted(async() => {
    wishlistCount.value = await getCount();
});

</script>
