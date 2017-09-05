// email testing regex
var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

// Vuejs Instance
new Vue({
    el: '#app',
	data: {
        nom_placeholder     : '',
        message_val         : '',  
        message_empty       : false ,
        nom_val             : '',  
        nom_empty           : false, 
        email_placeholder   : 'email@exemple.com',
        email_val           : '',  
        email_empty         : false,  
        email_invalid       : false, 
        isvalid             : false, 
        CaptchaVal             : this.Captcha, 
    },
    methods:{

    	handleSubmit: function(e){
            e.preventDefault();

            // Validate fields
            this.validate_email();
            this.nom_empty = this.validate_empty_input(this.nom_val)
            this.message_empty = this.validate_empty_input(this.message_val)
 
            // Submit form if all validation OK
            this.isvalid = this.validation_all_ok();
            if(this.isvalid){
                document.getElementById("deli-contact-form-fields").submit();
            }
        },

        validation_all_ok: function(input_val){
            if(!this.email_empty 
                && !this.email_invalid 
                && !this.nom_empty
                && !this.message_empty){
                return true;
            }
        },

        validate_empty_input: function(input_val){
            if(input_val==""){
                return true;
            }else{
                return false;
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

        // TODO 
        // SEE https://stackoverflow.com/questions/21727595/how-to-create-a-text-captcha-using-java-script-in-html-form
        Captcha: function(){
             var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
             var i;
             for (i=0;i<6;i++){
               var a = alpha[Math.floor(Math.random() * alpha.length)];
               var b = alpha[Math.floor(Math.random() * alpha.length)];
               var c = alpha[Math.floor(Math.random() * alpha.length)];
               var d = alpha[Math.floor(Math.random() * alpha.length)];
               var e = alpha[Math.floor(Math.random() * alpha.length)];
               var f = alpha[Math.floor(Math.random() * alpha.length)];
               var g = alpha[Math.floor(Math.random() * alpha.length)];
              }
            var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
            document.getElementById("mainCaptcha").value = code;
        },
        ValidCaptcha: function(){
          var string1 = this.removeSpaces(document.getElementById('mainCaptcha').value);
          var string2 = this.removeSpaces(document.getElementById('txtInput').value);
          if (string1 == string2){
            return true;
          }else{        
            return false;
          }
        },
        removeSpaces: function(string){
            return string.split(' ').join('');
        }         
    }
})