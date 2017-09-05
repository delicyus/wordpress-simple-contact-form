// email testing regex
var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

// Vuejs Instance
new Vue({
    el: '#app',
	data: {
        nom_placeholder    : '',
        nom_val            : '',  // input val
        nom_empty          : false, // message
        email_placeholder  : 'exemple@exemple.com',
        email_val          : '',  // input val
        email_empty        : false, // message
        email_invalid    : false, // message
        isvalid    : false, // message
    },
    methods:{

    	handleSubmit: function(e){
            e.preventDefault();

            // Validate fields
            this.validate_email();
            this.validate_empty_input(this.nom_val)

            // Submit form if all validation OK
            this.isvalid = this.validation_all_ok();
            if(this.isvalid){
                jQuery("#deli-contact-form-fields").submit();
            }

        },

        validation_all_ok: function(input_val){
            if(!this.email_empty && !this.email_invalid && !this.nom_empty){
                return true;
            }
        },

        validate_empty_input: function(input_val){
            if(input_val==""){
                this.nom_empty = true;
            }else{
                this.nom_empty = false;
            }
        },

        validate_email: function(){
            // Email vide
            if(this.email_val==""){
                this.email_empty=true;
            }else{
                // email saisi
                this.email_empty= false;

                // email validation du format : return true if is valide
                this.email_invalid = emailRE.test(this.email_val);
                
                // Adaptes la variable pour le message d'erreur de la vue
                if(!this.email_invalid)
                    this.email_invalid = true;
                else
                    this.email_invalid = false;
            }
        },

    }
})