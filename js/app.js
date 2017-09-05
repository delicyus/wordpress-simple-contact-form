var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

// Define a new component  
Vue.component('deli-contact-form', {
    props:['message']
})

new Vue({
  el: '#app',
	data: {
        email_placeholder  : 'exemple@exemple.com',
        email_val          : '',
    	err_message_email  : '',
        email_format: true
    },
    methods:{
    	handleSubmit: function(e){
            e.preventDefault();
            
            this.email_format = emailRE.test(this.email_val);

            if(this.email_val==""){
                this.err_message_email=true;
            }else{
                this.err_message_email= false;
            }

    	}
    }
})