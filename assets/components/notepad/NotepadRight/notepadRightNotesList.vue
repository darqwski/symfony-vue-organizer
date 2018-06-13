<template>

        <ul class="collection">
            <MenuNotesItem
                    v-for="note in notes"
                    v-bind:key="note.id"
                    v-bind:note="note"
            ></MenuNotesItem>
            {{getNotes}}
        </ul>
</template>

<script>
    import MenuNotesItem from './notepadRightNotesListItem'
    export default {
        name: "notepadRightNotesList",
        data () {
            return {
                notes: []
            }
        },
        computed:{
            getNotes:function () {
                let self = this;
                fetch('http://localhost:8080/data/notes/get?limit=0&notepad='+this.$root.$data.notepadID)
                    .then(resp => resp.json())
                    .then(resp => {
                        self.notes=[]
                        for(var i=0;i<resp.length;i++){
                            self.notes.push({
                                title:resp[i].title,
                                firstLine:resp[i].firstLine,
                                text:resp[i].text,
                                date:resp[i].date,
                                notepad:resp[i].notepad
                            })
                        }

                    })
            }
        },
        components:{MenuNotesItem},
        props:['notepad']
    }
</script>

<style scoped>

</style>