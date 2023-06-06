<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import VueCal from 'vue-cal'
import Button from '@/Jetstream/Button.vue'
import 'vue-cal/dist/vuecal.css'
defineProps({ user: Object, events: Object})

const schema = [
  {
    $formkit: 'text',
    name: 'title',
    label: 'Title',
    className:"asasds",
    help: 'This will be used for your account.',
    validation: 'required'
  },
  {
    $formkit: 'textarea',
    name: 'description',
    label: 'Description',
    className:"asasds",
    help: 'This will be used for your account.',
    validation: 'required'
  },
  {
    $formkit: 'date',
    name: 'start',
    label: 'Start',
    className:"asasds",
    help: 'This will be used for your account.',
    validation: 'required'
  },
  {
    $formkit: 'date',
    name: 'end',
    label: 'End',
    className:"asasds",
    help: 'This will be used for your account.',
    validation: 'required'
  }

]
</script>

<template>
  <AppLayout title="Events">
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Events
        </h2>
        <Button>
          Add Event
        </Button>
      </div>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <vue-cal style="height: 400px" :events="events.data" :time="true" />
            <FormKit type="form">
              <FormKitSchema :schema="schema" />
            </FormKit> 
        </div>
      </div>
    </div>
  </AppLayout>
</template>