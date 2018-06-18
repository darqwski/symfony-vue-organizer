<template>
    <ul class="collection with-header z-depth-3">
        <li :class="ulClass">
            <h4>Last edited notes</h4></li>
        <MenuLastNotesItem
                v-for="note in notes"
                v-bind:key="note.id"
                v-bind:note="note"
        ></MenuLastNotesItem>
        {{getNotes}}
    </ul>

</template>

<script>
    import MenuLastNotesItem from './notepadLeftMenuLastNotesItem'
    export default {
        name: "lastNotes",
        data () {
            return {notes: []}
        },
        components: {MenuLastNotesItem},
        computed:{
            ulClass:function () {
            return 'collection-header '+this.$root.$data.notepadSecondColor;
            },
            getNotes:function () {
                let self = this;
                fetch('http://localhost:8080/data/notes/get?limit=0&number=3')
                    .then(resp => resp.json())
                    .then(resp => {
                        for(var i=0;i<resp.length;i++){
                            self.notes.push({
                                title:resp[i].title,
                                firstLine:resp[i].firstLine,
                                text:resp[i].text,
                                date:resp[i].date,
                                notepad:resp[i].notepad,
                                ID:resp[i].ID
                            })
                        }

                    })
            }
        }
    }
</script>

<style scoped>

</style>