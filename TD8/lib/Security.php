<?php

	class Security{

		static function chiffrer($texte_en_clair) {
			$texte_chiffre = hash('sha256', $texte_en_clair);
			return $texte_chiffre;
		}
	}
?>