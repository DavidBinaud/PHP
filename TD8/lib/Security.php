<?php

	class Security{

		private static $seed = 'GEMCVO4I4A';

		static function chiffrer($texte_en_clair) {
			$texte_chiffre = hash('sha256', self::$seed . $texte_en_clair);
			return $texte_chiffre;
		}



		static public function getSeed() {
		   return self::$seed;
		}
	}
?>