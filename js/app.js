// Define a new component  
Vue.component('deli-contact-form', {
  props:['message']
})

new Vue({
  el: '#app',
	data: {
    	message: 'Hello Vue.js!'
    },
    methods:{
    	handleSubmit: function(){
    		alert("submit handled");
    		
    	}
    }
})