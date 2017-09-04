<?php
/*
Plugin Name: Deli Contact  
Plugin URI: http://delicyus.com
Description: Affiche une page de contact
Version: 2017-09
Author: delicyus 
Author URI: http://delicyus.com
License: GPL2
*/
if ( ! defined( 'WPINC' ) ) die; 
if(! class_exists('Deli_Contact_Plugin') ){

    class Deli_Contact_Plugin
    {
        public function __construct()
        {
        	// Var
        	$this -> page_contact_slug 	= 'contacts-page';

			//response messages
			$this -> not_human       = "Merci de valider la v&eacute;rification.";
			$this -> missing_content = "Merci de remplir tous les champs.";
			$this -> email_invalid   = "Adresse e-mail invalide.";
			$this -> message_unsent  = "Message non envoy&eacute;. Merci de r&eacute;essayer ullt&eacute;rieurement.";
			$this -> message_sent    = "Bravo ! Votre message est bien parti.";

			//user posted variables
			$this -> name 		= $_POST['message_name'];
			$this -> email 		= $_POST['message_email'];
			$this -> message 	= $_POST['message_text'];
			$this -> human 		= $_POST['message_human'];     

			// Formulaire wording
			$this -> wordings ['youremail'] 	= "votre e-mail";   			
			$this -> wordings ['yourname'] 		= "votre nom";   			
			$this -> wordings ['yourmessage'] 	= "votre message";   			
			$this -> wordings ['verification'] 	= "Humain ?";   			
			$this -> wordings ['envoyer'] 		= "Envoyer";   			

			//php mailer variables
			$this -> to 		= get_option('admin_email');
			$this -> subject 	= "Someone sent a message from ".get_bloginfo('name');
			$this -> headers 	= 'From: '
								. $this -> email . "\r\n" 
								. 'Reply-To: ' . $this -> email . "\r\n";

        	// Hooks

        	// Shotcode pour le fomrulaire
			add_shortcode('render_formulaire', array($this,'render_formulaire'));

			// CSS 
			// sur la page contact only -> if(is_page($this -> page_contact_slug))
		        wp_enqueue_style( 
		        	'deli-contact-css', 
		        	plugin_dir_url(__FILE__) . '/styles.css' , 
		        	'' ,  
		        	strtotime(date('Y-m-d H:i:s') )  , 
		        	'screen' );
        
        	// process the submitted form 
	        add_action('wp_head', array($this,'process_form'));
        }



        // PROCESSING

    	// process the submitted form			 
		public function process_form(){
		 
			if(isset($_POST)){

				if(!$this -> human == 0){
					
					if( $this -> human != 2) 
						$this -> generate_response("error", $this -> not_human); //not human!
					else {

					  //validate email
					  if(!filter_var($this -> email, FILTER_VALIDATE_EMAIL))
					    $this -> generate_response("error", $this -> email_invalid);
					  else //email is valid
					  {
					    // validate presence of name and message
					    if(empty($this -> name) || empty($this -> message)){
					      $this -> generate_response("error", $this -> missing_content);
					    }
					    else //ready to go!
					    {
					      $this -> sent = wp_mail($this -> to, $this -> subject, strip_tags($this -> message), $this -> headers);
					      if($this ->sent) {
					      	$this -> generate_response("success", $this ->message_sent); //message sent!
					      	$_POST = array();
					      }
					      else 
					      	$this -> generate_response("error", $this ->message_unsent); //message wasn't sent
					    }
					  }
					}
				}
				elseif ($_POST['submitted']) 
					$this -> generate_response("error", $this ->missing_content);
			}
		}
		//function to generate response
		private function generate_response($type, $message){
			if($type == "success") 
				$this ->response = "<div class='success'>{$message}</div>";
			else 
				$this ->response = "<div class='error'>{$message}</div>";
		}        




        // RENDERING

        //	May be called as a shortcode too :
        // 	echo do_shortcode('[render_formulaire argument="argument"]');
        public function render_formulaire($args)
        {
        	echo $this->get_template_html( 'contact-form' , array("wordings" => $this -> wordings));
        } 


        // DEMO ONLY
        public function render_demo($args)
        {
        	echo do_shortcode('[render_formulaire argument="argument"]');
        }


    	// HELPERS 

		/**
		 * Renders the contents of the given template to a string and returns it.
		 *
		 * 	@param string $template_name The name of the template to render (without .php)
		 * 	@param array  $attributes    The PHP variables for the template
		 *
		 * 	@return string               The contents of the template.
		 *	@example					$this->get_template_html( '__TEMPLATE NAME STRING__', $attributes );
		 */
		private function get_template_html( $template_name, $attributes = null ) {
			if ( ! $attributes ) 
				$attributes = array();
			
			ob_start();

			require( 'templates/' . $template_name . '.php');

			$html = ob_get_contents();
			ob_end_clean();

			return $html;
		}    	


    } // endClass

    // global instance
    global $Deli_Contact_Plugin;
    $Deli_Contact_Plugin = new Deli_Contact_Plugin();

} // Endif
?>