<template>
    <li class="collection-item avatar">
        <img v-bind:src="notepad.img" alt=""  v-bind:class="notepad.color">
        <span class="title">{{notepad.title}}</span>
        <p>Ostatnio edytowany : {{notepad.modificationDate}}<br>

        </p>
    </li>
</template>

<script>
    export default {
        name: "itemList",
        props: ['notepad'],
        data(){return {}}

    }

</script>

<style scoped>

</style>