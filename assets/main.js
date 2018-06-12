import Vue from 'vue'
import notepadApp from './components/notepad/notepadApp.vue'

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
    el: '#calendarApp',
    components: { notepadApp },
    template: '<notepadApp/>'
})
