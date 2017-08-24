<template>
    <ul class="collection with-header">
        <li class="collection-header">
            <h4>{{ title }}</h4>
        </li>
        <slot></slot>
    </ul>
</template>

<script>
    export default {
        props: ['title'],
        data() {
            return {
                tasks: [],
            }
        },

        mounted() {
            this.tasks = this.$children
        }
    }
</script>

<style>

</style>
