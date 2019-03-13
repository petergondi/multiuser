
require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
  created(){
      Echo.private('testChannel')
      .listen('requestNotify',(e)=>{
          alert("hi there");
      });
  }
    
});




