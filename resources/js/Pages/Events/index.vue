<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import VueCal from 'vue-cal'
import Button from '@/Jetstream/Button.vue'
import 'vue-cal/dist/vuecal.css'
import { reactive } from 'vue';
import DialogModal from '@/Jetstream/DialogModal.vue'

const props = defineProps({ user: Object, events: Object, projects: Object })

const schema = [

  {
    $formkit: 'text',
    name: 'title',
    label: 'Title',

    help: 'This will be used for your account.',
    validation: 'required'
  },
  {
    $formkit: 'textarea',
    name: 'content',
    label: 'content',
    help: 'This will be used for your account.',
    validation: 'required'
  },
  {
    $el: 'div',
    attrs: {
      class: 'flex flex-column w-1/2'
    },
    children: [
      {
        $formkit: 'datetime-local',
        name: 'start',
        label: 'Start',
        help: 'This will be used for your account.',
        validation: 'required'
      },
      {
        $formkit: 'datetime-local',
        name: 'end',
        label: 'End',
        help: 'This will be used for your account.',
        validation: 'required'
      },
    ]
  },
  {
    $formkit: 'select',
    name: 'project_id',
    label: 'Project',
    help: 'This will be used for your account.',
    validation: 'required',
    options: [{ id: 0, label: 'Seleccione una opcion' }].concat(props.projects.data)
  },

  {
    $formkit: 'select',
    name: 'task_id',
    label: 'Task',
    help: 'This will be used for your account.',
    validation: 'required',
    options: [{ id: 0, label: 'Seleccione una opcion' }]
  },
]

const form = reactive({
  title: "",
  content: "",
  start: "",
  end: "",
  task_id: 0,
  project_id: 0,

})
const state = reactive({ isModalOpen: false })
const openModal = (e) => {
  state.isModalOpen = true
}
</script>

<template>
  <AppLayout title="Events">
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Events
        </h2>
        <Button @click="openModal">
          Add Event
        </Button>
      </div>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <vue-cal style="height: 400px" :events="props.events.data" :time="true" />
          <DialogModal :show="state.isModalOpen">
            <template #content>
              <FormKit type="form">
                <FormKitSchema :schema="schema" :data="form" />
              </FormKit>
            </template>
          </DialogModal>
        </div>
      </div>
     </div> 
    </AppLayout>
</template>
