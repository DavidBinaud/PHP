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
		if ($u->get('admin')) {
			$admin_checkbox = "checked";
		}
		var_dump($u->get('admin'));
	}

	if(!Session::is_admin()){
		$admin_checkbox = "hidden";
		$label_checkbox = "hidden";
	}
?>
	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de <?php echo $titreForm;?>:</legend>
	    
	    <p>
	      <label for="login_id">Login:</label>
	      <input type="text" value=<?php echo $uLogin;?> name="login" id="login_id" <?php echo $loginParam;?>/>
	    </p>

	    <p>
	      <label for="nom_id">Nom:</label>
	      <input type="text" value=<?php echo $uNom;?> name="nom" id="nom_id" required/>
	    </p>

	    <p>
	      <label for="prenom_id">Prenom:</label>
	      <input type="text" value=<?php echo $uPrenom;?> name="prenom" id="prenom_id" required/>
	    </p>

	    <p>
	      <label for="pass_id">Mot de Passe:</label>
	      <input type="password"  name="pass" id="pass_id" required/>
	    </p>

	    <p>
	      <label for="confimpass_id">Confirmation MDP:</label>
	      <input type="password" name="passconfirm" id="confimpass_id" required/>
	    </p>


	    <p>
	      <label for="admin_id" <?php echo $label_checkbox?>>Administrateur?:</label>
	      <input type="checkbox" name="is_admin" id="admin_id" <?php echo $admin_checkbox;?>/>
	    </p>




	    <p>
	      <input type='hidden' name='action' value=<?php echo $actionAfter?>>
	      <input type='hidden' name='controller' value=<?php echo $controller?>>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
