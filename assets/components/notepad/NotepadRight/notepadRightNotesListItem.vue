<template>
    <li class="collection-item">
        <span class="title">{{note.title}}</span>
        <p>{{note.firstLine}}</p>
        <br>
        <p href="#!" class="secondary-content">Ostatnio edytowany : {{note.date}}</p>
    </li>
</template>

<script>
    export default {
        name: "notesList",
        props: ['note'],
        data(){return {}}

    }
</script>

<style scoped>

</style>