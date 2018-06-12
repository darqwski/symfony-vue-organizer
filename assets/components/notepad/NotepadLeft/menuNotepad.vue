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
            return {notepads: []}
        },
        components: {itemList},
        computed:{
            getNotepads:function () {
                let self = this;
                fetch('http://localhost:8080/data/notepads/get')
                    .then(resp => resp.json())
                    .then(resp => {

                        for(var i=0;i<resp.length;i++){
                            self.notepads.push({
                                title:resp[i].Name,
                                img:resp[i].img,
                                creationDate:resp[i].creationDate,
                                modificationDate:resp[i].modificationDate,
                                color:resp[i].color+" circle"
                            })
                        }
                    })
            }
        }
        }



</script>

<style scoped>

</style>