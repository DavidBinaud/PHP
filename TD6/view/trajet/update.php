<?php
	$controller = static::$object;
	$loginParam = "";
	if($tAction == "create"){
		$loginParam = "";
		$actionAfter = "created";
		$idType = "hidden";
		$label = "";
		$titreForm = "Création de " . ucfirst(static::$object);
	}else {
		$loginParam = "readonly";
		$actionAfter = "updated";
		$idType = "text";
		$label ="<label for=\"id_id\">Id</label> :";
		$titreForm = "Mise à Jour de " . ucfirst(static::$object);
	}
?>

	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de <?php echo $titreForm;?>:</legend>
	    
	    <p>
	      <?php echo $label ;?>
	      <input type=<?php echo "$idType value=$tid name=id id=id_id $loginParam";?>/>
	    </p>
	    
	    <p>
	      <label for="depart_id">Depart</label> :
	      <input type="text" value=<?php echo $tdepart;?> name="depart" id="depart_id" required/>
	    </p>

	    <p>
	      <label for="arrivee_id">Arrivee</label> :
	      <input type="text" value=<?php echo $tarrivee;?> name="arrivee" id="arrivee_id" required/>
	    </p>
	    
	    <p>
	      <label for="date_id">Date</label> :
	      <input type="text" value=<?php echo $tdate;?> name="date" id="date_id" required/>
	    </p>
	    
	    <p>
	      <label for="nbplaces_id">Nbplaces</label> :
	      <input type="text" value=<?php echo $tnbplaces;?> name="nbplaces" id="nbplaces_id" required/>
	    </p>
	    	    
	    <p>
	      <label for="prix_id">Prix</label> :
	      <input type="text" value=<?php echo $tprix;?> name="prix" id="prix_id" required/>
	    </p>
	    	    
	    <p>
	      <label for="conducteur_login_id">Conducteur Login</label> :
	      <input type="text" value=<?php echo $tconducteur_login;?> name="conducteur_login" id="conducteur_login_id" required/>
	    </p>
	    
	    

	    <p>
	      <input type='hidden' name='action' value=<?php echo $actionAfter;?>>
	      <input type='hidden' name='controller' value=<?php echo $controller;?>>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
