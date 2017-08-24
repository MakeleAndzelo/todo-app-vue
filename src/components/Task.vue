<template>
    <li class="collection-item" :class="{ 'finished' : isFinished }">
        <div>
            <slot></slot>
            <a href="#!" class="secondary-content" v-show="!isFinished" @click="finishTask">End</a>
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                isFinished: false
            }
        },

        methods: {
            finishTask() {
                this.isFinished = true;
            }
        }
    }
</script>

<style>
    li.finished {
        text-decoration: underline;
    }
</style>
