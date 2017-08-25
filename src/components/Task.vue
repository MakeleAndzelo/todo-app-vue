<template>
    <li class="collection-item" :class="{ 'finished' : finished }">
        <div>
            <slot></slot>
            <a href="#!" class="secondary-content" v-show="!finished" @click="finishTask">
                End
            </a>
        </div>
    </li>
</template>

<script>
    export default {
        props: [
            'isFinished'
        ],

        data() {
            return {
                finished: this.isFinished
            }
        },

        methods: {
            finishTask() {
                this.finished = true;
            }
        },
    }
</script>

<style>
    li.finished {
        text-decoration: underline;
    }
</style>
