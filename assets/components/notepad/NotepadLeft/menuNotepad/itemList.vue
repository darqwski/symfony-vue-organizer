<template>
    <li class="collection-item avatar">
        <img v-bind:src="notepad.img" alt="" class="circle">
        <span class="title">{{notepad.title}}</span>
        <p>Maybe Date off creation?<br>
         {{notepad.img}}
        </p>
    </li>
</template>

<script>
    export default {
        name: "itemList",
        props: ['notepad']
    }
</script>

<style scoped>

</style>