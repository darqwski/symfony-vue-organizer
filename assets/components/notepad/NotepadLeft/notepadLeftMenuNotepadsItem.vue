<template>
    <a class="collection-item avatar" v-on:click="changeRightNotepadView(notepad.ID)">
        <img  v-bind:src="notepad.img" alt=""  v-bind:class="notepad.color">
        <b><a class="title">{{notepad.title}}</a></b>
        <a href="#!" class="secondary-content">Ostatnio edytowany : {{notepad.modificationDate}}</a>
    </a>
</template>

<script>
    export default {
        name: "itemList",
        props: ['notepad'],
        data(){return {}},
        methods:{
            changeRightNotepadView:function(id){
                this.$root.$data.notepadID=id;
                console.log(id)
                    this.$root.$data.type="noteList";

            }
        }


    }

</script>

<style scoped>
a,span,p{
    display:block;
    color:rgba(0,0,0,.87);
    text-decoration: none;
}
</style>