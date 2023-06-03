<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Task from '../../components/Task.vue';
import DialogModal from '@/Jetstream/DialogModal.vue'
import Button from '@/Jetstream/Button.vue'
import { reactive } from 'vue';
import { FormKitSchema } from '@formkit/vue'
defineProps({ user: Object })
const state = reactive(({
  isModalOpen: false
}))

const openModal = (e) => {
  state.isModalOpen = true
}
const schema = [
  {
    $el: 'h1',
    children: 'Register'
  },
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
    help: 'Enter the description',
    validation: 'required|length:5,150'
  }]


</script>

<template>
  <AppLayout title="Tasks">
    <template #header>
      <div class="flex justify-between	">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Tasks
        </h2>
        <Button @click="openModal">
          Agregar Tarea
        </Button>
      </div>
    </template>

    <div class="py-12">
      <DialogModal  :show="state.isModalOpen">
        <template #content>
          <FormKit type="form">
            <FormKitSchema :schema="schema" />
          </FormKit> 
        </template>
      </DialogModal>
      <div class="flex flex-row">
        <div class="overflow-hidden sm:rounded-lg">
          <div class="container mx-4">
            <h2 class="font-extrabold text-lg">
              To Do
            </h2>
          </div>
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
        </div>
        <div class="overflow-hidden sm:rounded-lg">
          <div>
            <h2>
              To Do
            </h2>
          </div>
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
        </div>
        <div class="overflow-hidden sm:rounded-lg">
          <div>
            <h2>
              To Do
            </h2>
          </div>
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
        </div>
        <div class="overflow-hidden sm:rounded-lg">
          <div>
            <h2>
              To Do
            </h2>
          </div>
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
          <Task title="Organizar Dashboard" description="Se debe crear un dashboard interactivo"
            :assing_to="{ user_name: 'David Delcid', image_url: '' }" priority="Urgent"
            :created_by="{ user_name: 'Fernando Rivera', image_url: '' }" />
        </div>
      </div>
    </div>

  </AppLayout>
</template>