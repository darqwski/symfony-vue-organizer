<template>
    <textarea id="notepadTextEdition">{{note.text}}{{getEditNote}}</textarea>

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
                                text:this.translateText(resp[0].text),
                                date:resp[0].date,
                                notepad:resp[0].notepad
                            }


                    })
            }
        },
        methods:{
        translateText(text){
            while(text!=text.replace('<br \/>','\r\n'))text=text.replace('<br \/>','\r\n');
            return text;
        }
        }
    }
</script>

<style scoped>
textarea{
    max-height: 100%;
    max-width: 100%;
    height: 100%;
    width: 100%;
    background-color: white;
overflow:auto;
}
</style>