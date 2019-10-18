<?php
	$controller = static::$object;
	$immatParam = "";
	if($vAction == "create"){
		$immatParam = "required";
		$actionAfter = "created";
		$titreForm = "Création";
	}else {
		$immatParam = "readonly";
		$actionAfter = "updated";
		$titreForm = "Mise à Jour";
	}
    echo <<<EOT
	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de {$titreForm}:</legend>
	    
	    <p>
	      <label for="immat_id">Immatriculation</label> :
	      <input type="text" value=$vImmatriculation name="immatriculation" id="immat_id" {$immatParam}/>
	    </p>

	    <p>
	      <label for="marque_id">Marque</label> :
	      <input type="text" value=$vMarque name="marque" id="marque_id" required/>
	    </p>

	    <p>
	      <label for="coul_id">Couleur</label> :
	      <input type="text" value=$vCouleur name="couleur" id="coul_id" required/>
	    </p>

	    <p>
	      <input type='hidden' name='action' value={$actionAfter}>
	      <input type='hidden' name='controller' value={$controller}>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
EOT;


?>