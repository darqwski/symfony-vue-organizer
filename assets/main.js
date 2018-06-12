import Vue from 'vue'
import notepadApp from './components/notepad/notepadApp.vue'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
    el: '#notepadApp',
    components: { notepadApp },
    template: '<notepadApp/>'
})
