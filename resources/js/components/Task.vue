<script setup>
import { computed } from '@vue/reactivity';
import { taskStatus } from '../constans/taskStatus'
import { ClockIcon } from '@heroicons/vue/24/solid'


defineProps({
    priority: String,
    title: String,
    description: String,
    assing_to: Object,
    created_by: Object,
    image_url: String | null
});


const getPriorityColor = (priority) => taskStatus.find((item) => item.priority == priority).color

</script>
<template>
    <div class="container mx-auto">
        <div class="flex flex-nowrap">
            <div class="w-full p-4">
                <a href="#" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg">
                    <div v-show="image_url" class="relative pb-48 overflow-hidden">
                        <img class="absolute inset-0 h-full w-full object-cover" :src="image_url" alt="">
                    </div>
                    <div class="p-4">

                        <span :class="'inline-flex items-center uppercase rounded-md' + getPriorityColor(priority)"> {{
                            priority }} </span>
                        <h2 class="mt-2 mb-2  font-bold">{{ title }}</h2>
                        <p class="text-sm">{{ description }}</p>
                        <div class="mt-3 flex items-center">
                            <span class="text-sm font-semibold">
                                <ClockIcon class="h-6 w-6 text-red-500" />
                            </span>&nbsp;<span class="font-bold text-sm">19/02/2023</span>
                        </div>
                    </div>
                    <div class="p-4 border-t border-b text-xs text-gray-700">
                        <span class="flex items-center mb-1">
                            <i class="far fa-clock fa-fw mr-2 text-gray-900"></i> Responsable
                        </span>
                        <span class="flex items-start">
                            <img class="w-18 h-8 rounded-full ml-2"
                                src="https://avatars.githubusercontent.com/u/28819207?s=40&v=4" :alt="assing_to.user_name" />
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>