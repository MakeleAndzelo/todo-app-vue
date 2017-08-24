<template>
    <div id="app" class="container">
        <div class="row">
            <div class="col s6 offset-s3">
                <task-list title="My tasks">
                    <task>Clean home</task>
                    <task>Wash car</task>
                    <task>Do homework</task>
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
        components: {
            TaskList,
            Task
        }
    }
</script>

<style>
</style>
