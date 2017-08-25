<template>
    <div id="app" class="container">
        <div class="row">
            <div class="col s6 offset-s3">
                <task-list title="My tasks">
                </task-list>
            </div>
        </div>
    </div>
</template>

<script>
    import TaskList from "./components/TaskList.vue";
    import Task from "./components/Task.vue";

    export default {
        name: 'app',
        data() {
            return {
                tasks: [],
            }
        },
        components: {
            TaskList,
            Task
        },
        methods: {

        }
    }
</script>

<style>
</style>
