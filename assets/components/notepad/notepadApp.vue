<template>
    <div class="main-grid-container">
        <notepadLeft></notepadLeft>
        <notepadRight></notepadRight>
    </div>

</template>

<script>
    import notepadRight from "./notepadRight";
    import notepadLeft from "./notepadLeft";

export default {
        name: "notepadApp",
    /*
    notepadRight
        if v-bind:type="noteEdition" then note textAreatEdition
            else notes list
     */

    components: {notepadLeft,notepadRight},
    methods: {

    }
}
</script>

<style>
.main-grid-container{
    height: 100%;
}
</style>