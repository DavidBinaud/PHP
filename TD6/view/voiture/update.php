<?php
	$controller = static::$object;
	$immatParam = "";
	if($vAction == "create"){
		$immatParam = "required";
		$actionAfter = "created";
		$titreForm = "Création de " . ucfirst(static::$object);
	}else {
		$immatParam = "readonly";
		$actionAfter = "updated";
		$titreForm = "Mise à Jour de " . ucfirst(static::$object);
	}

?>
	<form method="get" action="index.php">
	  <fieldset>

	    <legend>Mon formulaire de <?php echo $titreForm;?>:</legend>
	    
	    <p>
	      <label for="immat_id">Immatriculation</label> :
	      <input type="text" value=<?php echo $vImmatriculation; ?> name="immatriculation" id="immat_id" <?php echo $immatParam; ?>/>
	    </p>

	    <p>
	      <label for="marque_id">Marque</label> :

	      <input type="text" value=<?php echo $vMarque;?> name="marque" id="marque_id" required/>
	    </p>

	    <p>
	      <label for="coul_id">Couleur</label> :
	      <input type="text" value=<?php echo $vCouleur;?> name="couleur" id="coul_id" required/>
	    </p>

	    <p>
	      <input type='hidden' name='action' value=<?php echo $actionAfter;?>>
	      <input type='hidden' name='controller' value=<?php echo $controller;?>>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>

