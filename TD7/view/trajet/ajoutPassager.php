<?php

	$select = "<select name=\"loginPassager\" id=\"loginPassager_id\" required >";
	foreach ($tab_Allu as $u) {
		$uLogin = htmlspecialchars($u->get('login'));
		$select = $select . "<option value=$uLogin>$uLogin</option>";
	}
	$select = $select . "</select>";
?>
	
    <!--echo <<<EOT-->
	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire d'ajout de Passager:</legend>
	    
	    <p>
	      <label for="id_id">Id</label> :
	      <input type="text" value="<?php echo $tid; ?>" name="id" id="id_id" required readonly/>
	    </p>
	    
	    <p>
	      <label for="loginPassager_id">Login Passager</label> :
	      <?php echo $select; ?>
	    </p>
	    

	    <p>
	      <input type='hidden' name='action' value=addedPassagerToTrajet>
	      <input type='hidden' name='controller' value='trajet'>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
<!--EOT;-->
