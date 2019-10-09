<?php
	
    $vImmatriculation = htmlspecialchars($v->getImmatriculation());
    $vMarque = htmlspecialchars($v->getMarque());
    $vCouleur = htmlspecialchars($v->getCouleur());

    echo <<<EOT
	<form method="get" action="index.php">
	  <fieldset>
	    <legend>Mon formulaire de Mise à jour:</legend>
	    
	    <p>
	      <label for="immat_id">Immatriculation</label> :
	      <input type="text" value=$vImmatriculation name="immatriculation" id="immat_id" required readonly/>
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
	      <input type='hidden' name='action' value='updated'>
	      <input type="submit" value="Envoyer" />
	    </p>
	  </fieldset> 
	</form>
EOT;


?>