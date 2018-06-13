<template>

    <nav>

        <div class="nav-wrapper light-green lighten-1" id="notepadToolBar" >
            <ul>
                <li><i class="material-icons">arrow_back</i></li>
                <li  v-if="this.$root.$data.type==='editNote' && this.$root.$data.noteID!='newNote'"  v-on:click="deleteFromServer()"> <i class="material-icons">remove</i></li>
                <li  v-if="this.$root.$data.type==='editNote'"  v-on:click="sendDataToServer()"> <i class="material-icons">save</i></li>
                <li  v-else  v-on:click="changeOnNewNoteView()"> <i class="material-icons">add</i></li>
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
            },
            sendDataToServer(){
                    var link="http://localhost:8080/data/notes";

                       if(this.$root.$data.noteID=="newNote")
                            link+="/add"
                       else
                            link+="/update";
                const formData = new FormData();
                        formData.append('title', document.getElementById("noteTitle").value);
                        formData.append('text', document.getElementById("notepadTextEdition").value);
                        formData.append('notepad',this.$root.$data.notepadID);/*NEED TO CHANGE*/
                        formData.append('ID',this.$root.$data.noteID)
                console.log(link)
                    fetch(link,{
                        method:"POST",
                        body:formData
                    }) .then(function (resp) {
                        resp.text().then(function (text) {
                                console.log(text)
                        });
                    })

            },
            deleteFromServer(){
                var link="http://localhost:8080/data/notes/delete";
                const formData = new FormData();
                formData.append('id',this.$root.$data.noteID)
                console.log(link)
                fetch(link,{
                    method:"POST",
                    body:formData
                }) .then(function (resp) {
                    resp.text().then(function (text) {
                        console.log(text)
                    });
                })
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