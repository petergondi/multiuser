

require('./bootstrap');

window.Vue = require('vue');


Vue.component('message', require('./components/Message.vue'));
Vue.component('sent-message', require('./components/Sent.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	messages: []
        },
    mounted(){
    	this.fetchMessages();
        Echo.private('my-channel')
            .listen('FormSubmitted', (e) => {
                this.messages.push({
                    reply: e.reply.reply,
                    user: e.user,
                    task:e.task
                })
      })
    },
    methods: {
    	addMessage(message) {
            this.messages.push(message)
            axios.post('/messages', message).then(response => {
                //console.log(response)
            })
        },
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data
            })
        }
    }
    
});




