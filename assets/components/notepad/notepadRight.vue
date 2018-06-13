<template>
    <div class="main-right-container">
        <notepadRightToolbar></notepadRightToolbar>
        <notepadRightTextarea v-if="this.$root.$data.type=='editNote'"></notepadRightTextarea>
        <notepadRightNoteList v-else ></notepadRightNoteList> {{changeNote}}
    </div>

</template>

<script>
    import notepadRightToolbar from "./NotepadRight/notepadRightToolBar";
    import notepadRightTextarea from "./NotepadRight/notepadRightNoteEdition";
    import notepadRightNoteList from "./NotepadRight/notepadRightNotesList";

    export default {
        name: "notepadRight",
        components:{notepadRightToolbar,notepadRightTextarea,notepadRightNoteList},
        props:['type'],
        computed:{
            changeNote:function () {
            }
        },
        data(){
            return{
            }
        }
    }
</script>

<style scoped lang='scss'>
.main-right-container{
    height: 100%;
}
</style>