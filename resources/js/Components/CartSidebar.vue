<template>
<div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden mb-10">
            <div class="divide-y divide-gray-200 space-y-5">
                <!-- category filter -->
                <div>
                    <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">categories</h3>
                    <div class="space-y-2">
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Design & Network</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Trafic & Marketplace</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Promo & Marketing</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Fiche produit</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Paiement</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Administration</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                        <!-- single category -->
                        <div class="flex items-center">
                            <input type="checkbox" id="cat-1" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="cat-1" class="text-sm text-gray-600 ml-3 cursor-pointer">Spécialisations</label>
                            <div class="ml-auto text-gray-600 text-sm">(15)</div>
                        </div>
                        <!-- single category end -->
                    </div>
                </div>
                <!-- category filter end -->
                
                <!-- price filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">price</h3>
                <div class="mt-4 flex items-center">
                    <input type="text" name="minprice" value="" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="min">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="text" name="maxprice" value="" class="w-full border-gray-300 focus:border-yellow-500 focus:ring:0 px-3 py-1 text-gray-600 text-sm shadow-sm rounded" placeholder="max">
                </div>
                </div>
                <!-- price filter end -->

                <!-- rating filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">Rating</h3>
                <div class="flex items-center gap-2">
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-1">
                        <label for="rating-1" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            1
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-2">
                        <label for="rating-2" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            2
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-3">
                        <label for="rating-3" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            3
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-4">
                        <label for="rating-4" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            4
                        </label>
                    </div>
                    <!-- single rating end -->
                    <!-- single rating -->
                    <div class="rating-selector">
                        <input type="radio" name="rating" class="hidden" id="rating-5">
                        <label for="rating-5" class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                            5
                        </label>
                    </div>
                    <!-- single rating end -->
                </div>
                </div>
                <!-- rating filter end -->

                <!-- platform filter -->
                <div class="pt-4">
                <h3 class="text-md text-gray-800 mb-3 uppercase font-medium">platforms</h3>
                    <div class="space-y-2">
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" name="wordpress" id="wordpress" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="wordpress" class="text-sm text-gray-600 ml-3 cursor-pointer">Wordpress</label>
                        </div>
                        <!-- single platform end -->
                        <!-- single platform -->
                        <div class="flex items-center">
                            <input type="checkbox" name="prestashop" id="prestashop" class="text-yellow-500 focus:ring-0 rounded-sm cursor-pointer">
                            <label for="prestashop" class="text-sm text-gray-600 ml-3 cursor-pointer">Prestashop</label>
                        </div>
                        <!-- single platform end -->
                    </div>
                </div>
                <!-- platform filter end -->
            </div>
        </div>
</template>

<script setup>

</script>
