<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import VueCal from 'vue-cal'
import Button from '@/Jetstream/Button.vue'
import 'vue-cal/dist/vuecal.css'
import { Inertia } from '@inertiajs/inertia';
defineProps({user: Object, events: Object})
import DialogModal from '@/Jetstream/DialogModal.vue'
import {reactive} from "vue";

const schema = [
    {
        $formkit: 'text',
        name: 'title',
        label: 'Title',
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    },
    {
        $formkit: 'textarea',
        name: 'content',
        label: 'Content',
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    },
    {
        $formkit: 'date',
        name: 'start',
        label: 'Start',
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    },
    {
        $formkit: 'date',
        name: 'end',
        label: 'End',
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    }

]

const state = reactive(({
    isModalOpen: false,
    eventForm: {
        title:"",
        content: "",
        date_start: "",
        date_final: "",
    },
    drag:false
}))

const openModal = (e) => {
    state.isModalOpen = true
}

const submitEvent = (e) => {
    console.log(state.eventForm)
    Inertia.post('/events', state.eventForm)
}

</script>

<template>
    <AppLayout title="Events">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Events
                </h2>
                <Button @click="openModal" >
                    Add Event
                </Button>
            </div>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <vue-cal style="height: 400px" :events="events.data" :time="true"/>
                    <DialogModal :show="state.isModalOpen" @submit="() => state.isModalOpen = false" >
                        <template #content>
                            <FormKit type="form" @submit="submitEvent">
                                <FormKitSchema :schema="schema" :data="state.eventForm"/>
                            </FormKit>
                        </template>
                    </DialogModal>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
