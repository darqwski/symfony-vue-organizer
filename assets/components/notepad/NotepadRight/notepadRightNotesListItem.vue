<template>
    <a class="collection-item avatar" v-on:click="changeOnEditNote(note.ID)">
        <span class="title"><b>{{note.title}}</b></span>
        <p>{{note.firstLine}}... <br>
        </p>
        <a href="#!" class="secondary-content">{{note.date}}</a>
    </a>
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
    .secondary-content,span,p{
        text-decoration: none;
        color:black;
    }
</style>