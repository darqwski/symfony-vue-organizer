<template>

    <nav>

        <div class="nav-wrapper light-green lighten-1" id="notepadToolBar" >
            <ul>
                <li><i class="material-icons">arrow_back</i></li>
                <li  v-if="this.$root.$data.type==='editNote'"> <i class="material-icons">save</i></li>
                <li  v-else> <i class="material-icons" v-on:click="">add</i></li>
            </ul>
           <input v-if="this.$root.$data.type==='editNote'" :value="this.$root.$data.noteTitle" id="noteTitle"/>
            <ul v-if="this.$root.$data.type==='editNote'">
                <li><i class="material-icons">format_underlined</i></li>
                <li><i class="material-icons">format_italic</i></li>
                <li><i class="material-icons">format_bold</i></li>
                <li><i class="material-icons">format_color_text</i></li>
                <li><i class="material-icons">delete</i></li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "notepadRightToolBar",
        data(){
            return{
            }
        },
        methods:{
            changeOnNewNoteView(){
                this.$root.$data.noteID="newNote"
                this.$root.$data.noteTitle=""
                this.$root.$data.type="editNote"
            }
        }
    }
</script>

<style scoped lang="scss">
    $marginLi:7px;

    #noteTitle{
}
    .nav-wrapper{
    display: grid;
    grid-template-columns: 2fr 6fr 4fr;

}
    ul{
     li{
        margin-left:$marginLi;
        margin-right: $marginLi;
        i.material-icons{
            font-size: 2rem;
        }
    }
}

</style>