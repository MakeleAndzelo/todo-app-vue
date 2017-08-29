<template>
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>{{ title }}</h4>
        </li>
        <li class="collection-item add-task">
            <input type="text" @keyup.enter="addTask" v-model="inputTaskName" placeholder="Write your task and press enter">
        </li>
        <task v-for="task in tasks" @removeTask="removeTask(task)" @finishTask="finishTask(task)" :name="task.name" :isFinished="task.is_finished" :key="task.id">
            {{ task.name }}
        </task>
    </ul>
</template>

<script>
    import Task from "./Task.vue"
    import axios from "axios/index.js"

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
            axios.get('/tasks')
                .then(response => {
                    this.tasks = response.data
                });
        },

        methods: {

            addTask() {
                this.tasks.unshift({name: this.inputTaskName, is_finished: false});
                this.inputTaskName = '';
            },

            finishTask(finishedTask) {
                axios.patch(`/tasks/${finishedTask  .id}`);
                this.tasks.forEach(task => {
                    if (task.is_finished) {
                        return;
                    }
                    task.is_finished = task.name == finishedTask.name;
                });
            },

            removeTask(removedTask) {
                axios.delete(`/tasks/${removedTask.id}`)
                    .then(response => {
                        this.tasks = this.tasks.filter(task => {
                            return task.id != removedTask.id;
                        })
                    })
            }

        },

        computed: {
            sortedTasks() {
                return this.tasks.sort((a, b) => {
                    return a.is_finished - b.is_finished;
                });
            }
        },
    }
</script>
