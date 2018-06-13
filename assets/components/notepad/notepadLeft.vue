<template>
    <div class="main-left-container">
        <MenuNotepads></MenuNotepads>
       <MenuLastNotes></MenuLastNotes>
    </div>

</template>

<script>
    import MenuNotepads from './NotepadLeft/notepadLeftMenuNotepads'
    import MenuLastNotes from './NotepadLeft/notepadLeftMenuLastNotes'
    export default {
        name: "NotepadLeft",
        components:{MenuNotepads,MenuLastNotes}
    }

</script>

<style>
    .main-left-container{
        height: 100%;
        max-height: 100%;
    }
</style>