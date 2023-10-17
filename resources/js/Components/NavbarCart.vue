<template>
        <span class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-red-500 text-white text-xs">{{ cartCount }}</span>
</template>

<script setup>

import { onMounted, ref } from 'vue';
import useModule from '../Composables/modules';
import emitter from 'tiny-emitter/instance.js';

const { getCount } = useModule();
const cartCount = ref(0);

emitter.on('cartCountUpdated', (count) => cartCount.value = count);

onMounted(async() => {
    cartCount.value = await getCount();
});

</script>
