<template>
    <ul class="collection">
        <notesList
                v-for="note in notes"
                v-bind:key="note.id"
                v-bind:note="note"
        ></notesList>
        {{getNotes}}
    </ul>

</template>

<script>
    import notesList from './notesList'
    export default {
        name: "lastNotes",
        data () {
            return {notes: []}
        },
        components: {notesList},
        computed:{
            getNotes:function () {
                let self = this;
                fetch('http://localhost:8080/data/notepad/get?limit=0')
                    .then(resp => resp.json())
                    .then(resp => {

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
        }
    }
</script>

<style scoped>

</style>