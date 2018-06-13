<template>
    <li class="collection-item">
        <span class="title">{{note.title}}</span>
        <p>{{note.firstLine}}
        <br>
         {{note.date}}</p>
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