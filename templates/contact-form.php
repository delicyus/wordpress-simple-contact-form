<?php 
// On recupere des variables dans une variable $attributes  
global $Deli_Contact_Plugin;
if($Deli_Contact_Plugin){
	?>

	<div id="app">
		<form v-on:submit="handleSubmit">

		    <p>
			    <label for="email"><?php echo $attributes ['wordings'] ['youremail'] ?> : <span>*</span></label>
			    <span v-if="err_message_email">Email requis</span>
			    <span v-if="!email_format">Email format err</span>
		    	<br>
		    	<input type="text" name="email_val" value="<?php echo esc_attr($_POST['email']); ?>" v-bind:placeholder="email_placeholder" v-model="email_val" >
	    	</p>

	    	
			<input type="submit">
		</form>
	</div>	

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
	
	</div>
	<?php
}
 ?>