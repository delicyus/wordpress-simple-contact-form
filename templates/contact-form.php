<?php 
// On recupere des variables dans une variable $attributes  
global $Deli_Contact_Plugin;
if($Deli_Contact_Plugin){
	?>

	<!-- adding Vuejs -->
	<div id="app">
		<form 
		method="POST" 
		v-on:submit.prevent="handleSubmit"
		id="deli-contact-form-fields" class="fields-grid">

		    <div class="form-row">
			    <div class="form-row-label">
				    <label for="message_email"><?php echo $attributes ['wordings'] ['youremail'] ?>
				    <span>*</span></label>
			    </div>	
			    <div class="form-row-input">
			    	<input 
			    	type="text" 
			    	name="message_email" 
			    	value="<?php echo esc_attr($_POST['message_email']); ?>" 
			    	v-bind:placeholder="email_placeholder" 
			    	v-model="message_email">
				    <ul>
				    	<li v-if="email_empty" class="error">
				    		<?php echo $attributes ['wordings'] ['email_empty'] ?></li>
				    	<li v-if="email_invalid" class="error">
				    		<?php echo $attributes ['wordings'] ['email_invalid'] ?></li>
				    </ul>
			    </div>	
		    </div>	

		    <div class="form-row">
			    <div class="form-row-label">
				    <label for="message_name"><?php echo $attributes ['wordings'] ['yourname'] ?>
				    <span>*</span></label>
			    </div>
		    	<div class="form-row-input">
			    	<input 
			    	type="text" 
			    	name="message_name" 
			    	value="<?php echo esc_attr($_POST['message_name']); ?>" 
			    	v-bind:placeholder="nom_placeholder" 
			    	v-model="message_name" >
				    <ul>
				    	<li v-if="nom_empty" class="error"><?php echo $attributes ['wordings'] ['champ_requis'] ?></li>
				    </ul>
			    </div>
	    	</div>
		    
		     <div class="form-row">
			    <div class="form-row-label">
			    	<label for="message_text">
				    	<?php echo $attributes ['wordings'] ['yourmessage'] ?>
				    	<span>*</span>
			    	</label>
		    	</div>
		    	<div class="form-row-input">
					<textarea 
			    	name="message_text" 
			    	v-model="message_text"><?php echo esc_attr($_POST['message_text']); ?></textarea>
				    <ul>
				    	<li v-if="message_empty" class="error">
				    	<?php echo $attributes ['wordings'] ['message_empty'] ?></li>
				    </ul>		    		
		    	</div>
	    	</div>

	    	<div class="form-row">

              	<label for="mainCaptcha">
              		<?php echo $attributes ['wordings'] ['verification'] ?> 
              		<span>*</span>
              	</label>

	    		<input type="text" disabled="disabled" id="mainCaptcha"  v-model="CaptchaVal"/>

              	<input type="button" id="refresh" value="<?php echo $attributes ['wordings'] ['captcha-refresh'] ?>" v-on:click="Captcha" />

	    		<br /><br />

              	<label for="mainCaptcha">
	              	<?php echo $attributes ['wordings'] ['captcha'] ?> 
	              	<span>*</span>
              	</label>
              	<input type="text" id="message_human" name="message_human" />  

              	<ul>
	              	<li v-if="!isValidCaptcha" class="error"><?php echo $attributes ['wordings'] ['captcha-err'] ?></li>
              	</ul>  	

	    	</div>	   

			<div class="form-row">
				<input type="submit" class="btn btn-success">
			</div>
		</form>
	</div>	



	<!-- Non Vuejs
	<div id="deli-contact-formulaire" class="deli-contact">
	  
	  <?php echo $Deli_Contact_Plugin -> response; ?>

	  <form method="post">
	  
	    <p><label for="name"><?php echo $attributes ['wordings'] ['yourname'] ?> : <span>*</span></label> 
	    <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></p>
	    
	    <p><label for="message_email"><?php echo $attributes ['wordings'] ['youremail'] ?> : <span>*</span> </label>
	    <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></p>
	    
	    <p><label for="message_text"><?php echo $attributes ['wordings'] ['yourmessage'] ?>: <span>*</span> </label>
	    <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></p>
	    
	    <p><label for="message_human"><?php echo $attributes ['wordings'] ['verification'] ?> : <span>*</span> </label>
	    <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</p>
	    
	    <p><input type="submit" value="<?php echo $attributes ['wordings'] ['envoyer'] ?>"></p>
	    <input type="hidden" name="submitted" value="1">
	    
	  </form>
	
	</div> -->
	<?php
}
 ?>