<template>
    <li class="collection-item" v-on:click="changeOnEditNote(note.ID)">
        <span class="title" >{{note.title}}</span>
        <p>{{note.firstLine}}</p>
        <br>
        <p href="#!" class="secondary-content">Ostatnio edytowany : {{note.date}}</p>
    </li>
</template>

<script>
    export default {
        name: "notesList",
        props: ['note'],
        data(){return {}},
        methods:{
            changeOnEditNote:function(id){
                    this.$root.$data.noteID=id;
                    this.$root.$data.type="editNote";
                    this.$root.$data.noteTitle=this.note.title;

            }
        }

    }
</script>

<style scoped>

</style>