<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Task from '../../components/Task.vue';
import SectionTitle from '@/Jetstream/SectionTitle.vue'
import ConfirmationModal from '@/Jetstream/ConfirmationModal.vue'
rea
import Button from '@/Jetstream/Button.vue'
import { reactive } from 'vue';
defineProps({ user: Object })

const openModal = (e) => {
  console.log("ADSDSAD")
}
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
      <ConfirmationModal>
        <template #content>
          <form action="">
            <input type="text">
          </form>
        </template>
      </ConfirmationModal>
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