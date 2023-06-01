<script setup>
import { computed } from '@vue/reactivity';
// import taskStatus from '../constans/taskStatus'

computed(() => ({
    // priorityColor(priority){
    //     return taskStatus.find((item) => item.priority == priority)
    // },
    
}))

defineProps({
    priority: String,
    title: String,
    description: String,
    assing_to: Object,
    created_by: Object,
    image_url: String
});
</script>
<template>
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
                <a href="" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
                    <div v-show="image_url" class="relative pb-48 overflow-hidden">
                        <img  class="absolute inset-0 h-full w-full object-cover"
                            :src="image_url"
                            alt="">
                    </div>
                    <div class="p-4">
                        <span
                            class="inline-block px-2 py-1 leading-none bg-orange-200 text-orange-800 rounded-full font-semibold uppercase tracking-wide text-xs">Highlight</span>
                        <h2 class="mt-2 mb-2  font-bold">{{ props.title }}</h2>
                        <p class="text-sm">{{ prop.description }}</p>
                        <div class="mt-3 flex items-center">
                            <span class="text-sm font-semibold">ab</span>&nbsp;<span
                                class="font-bold text-xl">45,00</span>&nbsp;<span class="text-sm font-semibold">€</span>
                        </div>
                    </div>
                    <div class="p-4 border-t border-b text-xs text-gray-700">
                        <span class="flex items-center mb-1">
                            <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> 3 Tage
                        </span>
                        <span class="flex items-center">
                            <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i> Ermäßigung mit Karte
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>