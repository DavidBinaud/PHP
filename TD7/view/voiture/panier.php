<?php
	
	if (isset($_SESSION) && isset($_SESSION['panier'])) {
		echo '<p>';
		foreach ($panier as $lignepanier) {
			foreach ($lignepanier as $produit => $qté) {
				echo " $produit $qté";
			}
			echo "<br>";
		}
		echo "Prix Panier {$_SESSION['prixpanier']} </p>";
	}else{
		echo "panier vide";
	}



?>