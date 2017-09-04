<?php 
// On recupere des variables dans une variable $attributes  
global $Deli_Contact_Plugin;
if($Deli_Contact_Plugin){
	?>
	<div id="respond" class="deli-contact">
	  
	  <?php echo $Deli_Contact_Plugin -> response; ?>

	  <form method="post">
	  
	    <p><label for="name"><?php echo $attributes ['wordings'] ['yourname'] ?> : <span>*</span> 
	    <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
	    
	    <p><label for="message_email"><?php echo $attributes ['wordings'] ['youremail'] ?> : <span>*</span> 
	    <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
	    
	    <p><label for="message_text"><?php echo $attributes ['wordings'] ['yourmessage'] ?>: <span>*</span> 
	    <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
	    
	    <p><label for="message_human"><?php echo $attributes ['wordings'] ['verification'] ?> : <span>*</span> 
	    <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
	    
	    <p><input type="submit" value="<?php echo $attributes ['wordings'] ['envoyer'] ?>"></p>
	    <input type="hidden" name="submitted" value="1">
	    
	  </form>
	
	</div>
	<?php
}
 ?>