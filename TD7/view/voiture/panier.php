<?php

	if(isset($_COOKIE) && isset($_COOKIE['panier'])){
		$panier = unserialize($_COOKIE['panier']);
		 echo '<p>';
		foreach ($panier as $lignepanier) {
			foreach ($lignepanier as $produit => $qté) {
				echo " $produit $qté";
			}
			echo "<br>";
		}
		echo '</p>';
	}else{
		echo "panier vide";
	}



?>