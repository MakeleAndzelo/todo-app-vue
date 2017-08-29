<template>
    <li class="collection-item" :class="{ 'finished' : isFinished }">
        <div>
            <slot></slot>
            <small v-show="isFinished"><i>(Finished)</i></small>
            <div class="secondary-content">
                <a href="#!" v-show="!isFinished" @click="finishTask">
                    <i class="fa fa-check"></i>
                </a>
                <a href="#!" @click="removeTask">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['isFinished', 'name'],

        created() {
            this.finished = this.isFinished;
        },

        methods: {
            finishTask() {
                this.$emit('finishTask');
            },

            removeTask() {
                this.$emit('removeTask');
            }
        },
    }
</script>

