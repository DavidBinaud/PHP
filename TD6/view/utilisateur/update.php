<?php
	$controller = static::$object;
	$loginParam = "";
	if($uAction == "create"){
		$loginParam = "required";
		$actionAfter = "created";
		$titreForm = "Création de " . ucfirst(static::$object);
	}else {
		$loginParam = "readonly";
		$actionAfter = "updated";
		$titreForm = "Mise à Jour de " . ucfirst(static::$object);
	}
?>
	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de <?php echo $titreForm;?>:</legend>
	    
	    <p>
	      <label for="login_id">Login</label> :
	      <input type="text" value=<?php echo $uLogin;?> name="login" id="login_id" <?php echo $loginParam;?>/>
	    </p>

	    <p>
	      <label for="nom_id">Nom</label> :
	      <input type="text" value=<?php echo $uNom;?> name="nom" id="nom_id" required/>
	    </p>

	    <p>
	      <label for="prenom_id">Prenom</label> :
	      <input type="text" value=<?php echo $uPrenom;?> name="prenom" id="prenom_id" required/>
	    </p>

	    <p>
	      <input type='hidden' name='action' value={$actionAfter}>
	      <input type='hidden' name='controller' value={$controller}>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
