<?php 
// On recupere des variables dans une variable $attributes  
global $Deli_Contact_Plugin;
if($Deli_Contact_Plugin){
	?>

	<div id="app">

		<form 
		method="POST" 
		v-on:submit.prevent="handleSubmit"
		id="deli-contact-form-fields">
		    <p>
			    <label for="email"><?php echo $attributes ['wordings'] ['youremail'] ?> : <span>*</span></label>
		    	<br>
		    	<input 
		    	type="text" 
		    	name="email_val" 
		    	value="<?php echo esc_attr($_POST['email']); ?>" 
		    	v-bind:placeholder="email_placeholder" 
		    	v-model="email_val">
			    <ul>
			    	<li v-if="email_empty" class="error"><?php echo $attributes ['wordings'] ['email_empty'] ?></li>
			    	<li v-if="email_invalid" class="error"><?php echo $attributes ['wordings'] ['email_invalid'] ?></li>
			    </ul>
	    	</p>
		    <p>
			    <label for="nom"><?php echo $attributes ['wordings'] ['yourname'] ?> : <span>*</span></label>
		    	<br>
		    	<input 
		    	type="text" 
		    	name="nom_val" 
		    	value="<?php echo esc_attr($_POST['message_name']); ?>" 
		    	v-bind:placeholder="nom_placeholder" 
		    	v-model="nom_val" >
			    <ul>
			    	<li v-if="nom_empty" class="error">Champ requis</li>
			    </ul>
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