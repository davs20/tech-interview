<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Task from '../../components/Task.vue';
import DialogModal from '@/Jetstream/DialogModal.vue'
import Button from '@/Jetstream/Button.vue'
import { reactive, computed, defineComponent } from 'vue';
import { FormKitSchema } from '@formkit/vue'
import draggable from "vuedraggable";
import { useForm } from '@inertiajs/inertia-vue3';


const props = defineProps({ users: Object, columns: Object, projects: Object })
const form = useForm({
    title: '',
    description: '',
    deadline: '',
    priority: '',
    assign_date: '',
    project_id: '',
    assign_to: '',
 
})

const state = reactive(({
    isModalOpen: false,
    users: props.users,
    columns: props.columns,
    drag: false
}))


const submit = () => {
    form.transform(data => ({
        ...data,
    })).post('/tasks');
};

const openModal = (e) => {
    state.isModalOpen = true
}

const schema = [
    {
        $formkit: 'text',
        name: 'title',
        label: 'Title',
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    },
    //
    // {
    //     $formkit: 'file',
    //     name: 'photo',
    //     label: 'Photo',
    //     help: 'Upload a photo ',
    //
    // },
    {
        $formkit: 'textarea',
        name: 'description',
        label: 'Description',
        help: 'Enter the description',
        validation: 'required|length:5,150'
    },

    {
        $formkit: 'datetime-local',
        name: 'deadline',
        label: 'Deadline',
        help: 'Enter the deadline',
        validation: 'required'
    },
    {
        $formkit: 'datetime-local',
        name: 'assign_date',
        label: 'Assign Date',
        help: 'Enter the assign date',
        validation: 'required'
    },
    {
        $formkit: 'select',
        name: 'priority',
        label: 'Priority',
        help: 'Enter the priority',
        validation: 'required',
        options: {
            urgent: 'Urgent',
            high: 'High',
            normal: 'Normal',
            low: 'Low'
        },

    },
    {
        $formkit: 'select',
        name: 'assign_to',
        label: 'Asing a User',
        help: 'Select the user',
        validation: '',
        options: [{value:0, label: 'Select an User'}].concat(props.users.data),
    },

    {
        $formkit: 'select',
        name: 'project_id',
        label: 'Project',
        help: 'Select the project',
        validation: '',
        options: [{value:0, label: 'Select an Project'}].concat(props.projects.data),
    }


]


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
        <div class="py-12 flex flex-row flex-nowrap">

            <div class="" v-for="(column, index) in state.columns.data">

                <draggable :list="column.tasks" item-key="id" class="list-group" group="columns" :key="column.id"
                    ghost-class="ghost">
                    <template #item="{ element }">
                        <Task :title="element.title" :description="element.description" :assing_to="element.assign_to"
                            :priority="element.priority" :created_by="element.owner" />
                    </template>
                </draggable>
            </div>

            <DialogModal :show="state.isModalOpen">
                <template #content>
                    {{ form }}
                    <FormKit type="form" @submit="submit" v-model="form">
                        <FormKitSchema :schema="schema" :data="form" />
                    </FormKit>
                </template>
            </DialogModal>
        </div>

    </AppLayout>
</template>

<style></style>
