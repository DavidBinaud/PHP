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
			</div>
    	</header>

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