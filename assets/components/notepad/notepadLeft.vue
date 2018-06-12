<template>
    <div>
        <menuNotepad></menuNotepad>
       <lastNotes></lastNotes>
    </div>

</template>

<script>
    import menuNotepad from './NotepadLeft/menuNotepad'
    import lastNotes from './NotepadLeft/lastNotes'
    export default {
        name: "NotepadLeft",
        components:{menuNotepad,lastNotes}
    }

</script>

<style scoped>

</style>