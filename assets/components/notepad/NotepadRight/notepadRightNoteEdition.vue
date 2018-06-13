<template>
    <textarea>
        {{note.text}}
    {{getEditNote}}
    </textarea>

</template>

<script>
    export default {
        name: "notepadRightNoteEdition",
        data(){
            return{
            note:{}
        }},
        computed:{
            getEditNote:function () {
                let self = this;
                if(this.$root.$data.noteID!="newNote")
                fetch('http://localhost:8080/data/notes/get?id='+this.$root.$data.noteID)
                    .then(resp => resp.json())
                    .then(resp => {
                            self.note={
                                title:resp[0].title,
                                firstLine:resp[0].firstLine,
                                text:resp[0].text,
                                date:resp[0].date,
                                notepad:resp[0].notepad
                            }


                    })
            }
        },
    }
</script>

<style scoped>
textarea{
    max-height: 100%;
    max-width: 100%;
    height: 100%;
    width: 100%;
overflow:auto;
}
</style>