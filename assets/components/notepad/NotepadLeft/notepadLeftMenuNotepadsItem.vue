<template>
    <li class="collection-item avatar" v-on:click="changeRightNotepadView(notepad.ID)">
        <img  v-bind:src="notepad.img" alt=""  v-bind:class="notepad.color">
        <span class="title">{{notepad.title}}</span>
        <p>Ostatnio edytowany : {{notepad.modificationDate}}<br>

        </p>
    </li>
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

</style>