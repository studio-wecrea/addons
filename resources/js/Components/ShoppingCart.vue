<template>
     <!-- single cart item -->
        <div v-for="module in modules" :key="module.id" class="grid grid-cols-9 flex items-center justify-between gap-p py-4 pl-8 pr-10 border border-gray-200 rounded">
            <!-- cart item image -->
            <div class="col-span-2 w-28 flex-shrink-0">
                <img :src="module.associatedModel.image" class="h-28 w-28 object-cover rounded">
            </div>
            <!-- cart item image end -->

            <!-- cart item content -->
            <div  class="col-span-5">
                <h2 class="text-gray-800 text-xl font-medium uppercase" v-text="module.name"> 
                </h2>
                <p class="text-gray-500 text-sm">
                Platform:
                    
                    <span class="text-yellow-600" v-text="module.associatedModel.platform_id"></span>
                    
                </p>
            </div>
            
            <!-- cart item content end -->

            <div class="col-span-1 text-primary text-lg font-semibold">{{ module.associatedModel.price }} €</div>
            
            <div v-on:click.prevent="destroy(module.id)" class="col-span-1 text-right text-gray-600 cursor-pointer hover:text-primary">
                <i class="fas fa-trash"></i>
            </div>
        </div>
        <!-- single cart item end -->
</template>

<script setup>

import useModule from '../Composables/modules';
import { onMounted } from 'vue';

const {
    modules,
    getModules,
    destroyModule
    
} = useModule()

const destroy = async(id) => {
    await destroyModule(id);
    await getModules();
}


onMounted(async() => {
    await getModules();
})
</script>