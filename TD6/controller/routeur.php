<?php
//require_once './ControllerVoiture.php';
require_once (File::build_path(array("controller","ControllerVoiture.php")));
// On recupère l'action passée dans l'URL


//Verifie qu'une action est passée dans l'url ; Si aucune action on fait l'action de base readALL
if(isset($_GET['action'])){
	$action = $_GET['action'];


	//Permet de recuperer un array contenant les noms des methodes de la classe ControllerVoiture
	$ControllerVoitureMethods = get_class_methods ('ControllerVoiture');

	//Verifie que l'action passée en paramètre est bien une action existante dans l'array des noms de méthodes ; si n'existe pas on fait l'action error du ControllerVoiture
	if(in_array($action, $ControllerVoitureMethods)){
		// Appel de la méthode statique $action de ControllerVoiture
		ControllerVoiture::$action();
	}
	else{
		ControllerVoiture::error();
	}
}
else{
	ControllerVoiture::readAll();
}
?>