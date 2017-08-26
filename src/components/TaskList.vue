<template>
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>{{ title }}</h4>
        </li>
        <li class="collection-item add-task">
            <input type="text" @keyup.enter="addTask" v-model="inputTaskName" placeholder="Write your task and press enter">
        </li>
        <task v-for="task in sortedTasks" @removeTask="removeTask(task.name)" @finishTask="finishTask(task.name)" :name="task.name" :isFinished="task.isFinished" :key="task.id">
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
                this.tasks.unshift({name: this.inputTaskName, isFinished: false});
                this.inputTaskName = '';
            },

            finishTask(taskName) {
                this.tasks.forEach(task => {
                    if (task.isFinished) {
                        return;
                    }
                    task.isFinished = task.name == taskName;
                });
            },

            removeTask(taskName) {
                this.tasks = this.tasks.filter(task => {
                    return task.name != taskName;
                })
            }

        },

        computed: {
            sortedTasks() {
                return this.tasks.sort((a, b) => {
                    return a.isFinished - b.isFinished;
                });
            }
        },
    }
</script>

<style>
</style>
