<template>
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>{{ title }}</h4>
        </li>
        <li class="collection-item add-task">
            <input type="text" @keyup.enter="addTask" v-model="inputTaskName" placeholder="Write your task and press enter">
        </li>
        <task v-for="task in tasks" :isFinished="task.isFinished" :key="task.id">
            {{ task.name }}
        </task>
    </ul>
</template>

<script>
    import Task from './Task.vue';

    export default {
        components: {
            Task
        },

        props: ['title'],

        data() {
            return {
                tasks: [],
                inputTaskName: '',
            }
        },

        created() {
            this.tasks = [
                {name: "Clean home", isFinished: false},
                {name: "Wash car", isFinished: false},
                {name: "Do homework", isFinished: true},
            ]
        },

        methods: {
            addTask() {
                this.tasks.push({name: this.inputTaskName, isFinished: false});
                this.inputTaskName = '';
            }
        }
    }
</script>

<style>
</style>
