<?php

	if(isset($_COOKIE) && isset($_COOKIE['panier'])){
		$panier = unserialize($_COOKIE['panier']);
		 echo '<p>';
		foreach ($panier as $produit => $qté) {
			echo " $produit $qté";
		}
		echo '</p>';
	}else{
		echo "panier vide";
	}



?>