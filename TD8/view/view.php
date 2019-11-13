<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>

    	<header>
    		<div class="nav">
			  <a href="index.php?action=readAll&controller=voiture">Gestion Voitures</a>
			  <a href="index.php?action=readAll&controller=utilisateur">Gestion Utilisateurs</a>
			  <a href="index.php?action=readAll&controller=trajet">Gestion Trajets</a>
              <a href="preference.html">Preference</a>
              <a href="index.php?action=getpanier&controller=voiture">Panier</a>
              <?php 
                if(!isset($_SESSION['login'])){
                    echo '<a href=index.php?action=connect&controller=utilisateur>Connexion</a>
                    </div>
                    </header>';
                  }else{
                    echo '    <a href="index.php?action=deconnect&controller=utilisateur">Deconnexion</a>
                            </div>
                          </header>' . "<p>Bienvenue {$_SESSION['login']}</p>";
                  }
              ?>
              
			

	<?php
		// Si $controleur='voiture' et $view='list',
		// alors $filepath="/chemin_du_site/view/voiture/list.php"
		$filepath = File::build_path(array("view", static::$object, "$view.php"));
		require $filepath;
	?>

    </body>
    <footer>
    		<p style="border: 1px solid black;text-align:right;padding-right:1em;">
  				Site de covoiturage de David Binaud
			</p>
    </footer>
</html>