<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
defineProps({ user: Object })
</script>

<template>
  <AppLayout title="Events">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Events
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <vue-cal style="height: 400px" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>