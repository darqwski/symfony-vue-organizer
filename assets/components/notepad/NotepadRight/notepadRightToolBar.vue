<template>

    <nav>
        <div :class="navDivClass" id="notepadToolBar" >
            <ul>
                <li><i class="material-icons" v-if="ifEditNote" v-on:click="backToNotepads">arrow_back</i></li>
                <li  v-if="ifUpdateNote" v-on:click="deleteFromServer()"> <i class="material-icons">delete</i></li>
                <li  v-if="ifEditNote" v-on:click="sendDataToServer()"> <i class="material-icons">save</i></li>
                <li  v-else  v-on:click="changeOnNewNoteView()"> <i class="material-icons">note_add</i></li>
                <li   v-if="ifNotEdit"  v-on:click=""> <i class="material-icons">create_new_folder</i></li>
            </ul>
           <input v-if="ifEditNote" :value="this.$root.$data.noteTitle" id="noteTitle"/>
            <ul v-if="ifEditNote">
                <li><i class="material-icons">format_underlined</i></li>
                <li><i class="material-icons">format_italic</i></li>
                <li><i class="material-icons">format_bold</i></li>
                <li><i class="material-icons">format_color_text</i></li>
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
        computed:{
            ifUpdateNote(){
                return this.$root.$data.type==='editNote' && this.$root.$data.noteID!='newNote'
            },
            ifEditNote(){
                return this.$root.$data.type==='editNote'
            },
            ifNotEdit(){
               return this.$root.$data.type!='editNote'
            },
            navDivClass(){
                return 'nav-wrapper '+this.$root.$data.notepadSecondColor;
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


                        var instance = M.Modal.getInstance(document.querySelector("#addNewNoteModal"));
                        instance.open();
                    console.log(instance.open())
                       if(this.$root.$data.noteID=="newNote")
                            link+="/add"
                       else
                            link+="/update";
                const formData = new FormData();
                var text=this.validateText(document.getElementById("notepadTextEdition").value);
                var title=this.validateTitle(document.getElementById("noteTitle").value)
                if(!(text&&title)){
                    alert("Chujnia andrzeju!")
                    return 0;
                }
                        formData.append('title', document.getElementById("noteTitle").value);
                        formData.append('text', text);
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
                fetch(link,{
                    method:"POST",
                    body:formData
                }) .then(function (resp) {
                    resp.text().then(function (text) {
                        var instance = M.Modal.getInstance(document.querySelector("#deleteNoteModal"));
                        instance.open();
                    });
                })
            },
            validateText(text){
                text=text.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
                return text;
            },
            validateTitle(title){
                title=title.trim();
                if(title.length>=300)return false;
                for(var i=0;i<this.$root.$data.bannedSigns.length;i++)
                    if(title.includes(this.$root.$data.bannedSigns[i]))return false;
                return title;
            },
            backToNotepads(){
                this.$root.$data.type="noteList";
            }
        }
    }
</script>

<style scoped lang="scss">
    $marginLi:7px;

    #noteTitle{
        color:white;
}
    .nav-wrapper{
    display: grid;
    grid-template-columns: 3fr 6fr 4fr;

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