<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Task from '../../components/Task.vue';
import DialogModal from '@/Jetstream/DialogModal.vue'
import Button from '@/Jetstream/Button.vue'
import {reactive, computed, defineComponent} from 'vue';
import {FormKitSchema} from '@formkit/vue'
import draggable from "vuedraggable";



const props = defineProps({users: Object, columns:Object})

const state = reactive(({
    isModalOpen: false,
    taskForm: {},
    users: props.users,
    columns: props.columns,
    drag:false
}))



const openModal = (e) => {
    state.isModalOpen = true
}

const logChanges = (e) => {
    console.log("asdasddassada")
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
        className: "asasds",
        help: 'This will be used for your account.',
        validation: 'required'
    },

    {
        $formkit: 'file',
        name: 'photo',
        label: 'Photo',
        help: 'Upload a photo ',

    },
    {
        $formkit: 'textarea',
        name: 'description',
        label: 'Description',
        help: 'Enter the description',
        validation: 'required|length:5,150'
    },

    {
        $formkit: 'date',
        name: 'deadline',
        label: 'Deadline',
        help: 'Enter the deadline',
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
        name: 'assing_to',
        label: 'Asing a User',
        help: 'Select the user',
        validation: 'required',
        options: {
            urgent: 'Urgent',
            high: 'High',
            normal: 'Normal',
            low: 'Low'
        },
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

                <draggable

                    :list="column.tasks"
                    item-key="id"
                    class="list-group"
                    group="columns"
                    :key="column.id"

                    ghost-class="ghost">
                    <template #item="{ element }">
                        <Task  :title="element.title" :description="element.description"
                                                         :assing_to="element.assign_to" :priority="element.priority"
                                                          :created_by="element.owner" />

                    </template>
                </draggable>
            </div>

<!--            <DialogModal :show="state.isModalOpen">-->
<!--                <template #content>-->
<!--                    <FormKit type="form">-->
<!--                        <FormKitSchema :schema="schema" :data="state.taskForm"/>-->
<!--                    </FormKit>-->
<!--                </template>-->
<!--            </DialogModal>-->
<!--            <div class="grid grid-flow-col gap-4 " v-for="column in columns.data">-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2 ">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                <div class="container mx-4">-->
<!--                    <h2 class="font-extrabold text-lg">-->
<!--                        {{column.column.title}}-->
<!--                    </h2>-->
<!--                </div>-->
<!--                <div v-for="task in column.tasks">-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                    <Task  :title="task.title" :description="task.description"-->
<!--                           :assing_to="task.assign_to" :priority="task.priority"-->
<!--                           :created_by="task.owner" />-->
<!--                </div>-->

<!--            </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->
<!--                <div class="overflow-hidden sm:rounded-lg w-1/2">-->
<!--                    <div class="container mx-4">-->
<!--                        <h2 class="font-extrabold text-lg">-->
<!--                            {{column.column.title}}-->
<!--                        </h2>-->
<!--                    </div>-->
<!--                    <div v-for="task in column.tasks">-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                        <Task  :title="task.title" :description="task.description"-->
<!--                               :assing_to="task.assign_to" :priority="task.priority"-->
<!--                               :created_by="task.owner" />-->
<!--                    </div>-->

<!--                </div>-->

<!--            </div>-->

        </div>

    </AppLayout>
</template>

<style>
</style>
