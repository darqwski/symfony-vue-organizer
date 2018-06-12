<template>
    <ul class="collection">
        <itemList
                v-for="notepad in notepads"
                v-bind:key="notepad.id"
                v-bind:notepad="notepad"
        ></itemList>
    {{getNotepads}}
    </ul>
</template>

<script>
    import itemList from "./menuNotepad/itemList";
    export default {
        name: "menuNotepad",

        data () {
            return {notepads: [
                    {title:"JEDEN",id:1}
            ]}
        },
        components: {itemList},
        computed:{
            getNotepads:function () {
                let self = this;
                fetch('http://localhost:8080/data/notepads/get')
                    .then(resp => resp.json())
                    .then(resp => {

                        for(var i=0;i<resp.length;i++){
                            self.notepads.push({title:resp[i].Name,img:resp[i].img})
                        }
                    })
            }
        }
        }



</script>

<style scoped>

</style>