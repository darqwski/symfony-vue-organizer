<template>
    <ul class="collection with-header z-depth-3">
        <li :class="'collection-header '+this.$root.$data.notepadSecondColor"><h4>Your Notepads</h4></li>
        <MenuNotepadsItem
                v-for="notepad in notepads"
                v-bind:key="notepad.id"
                v-bind:notepad="notepad"
        ></MenuNotepadsItem>
    {{getNotepads}}
    </ul>
</template>

<script>
    import MenuNotepadsItem from "./notepadLeftMenuNotepadsItem";
    export default {
        name: "menuNotepad",

        data () {
            return {notepads: []}
        },
        components: {MenuNotepadsItem},
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
                                color:resp[i].color+" circle",
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