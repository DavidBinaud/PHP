<?php
    $vlogin = htmlspecialchars($login);
    echo '<p> L\'utilisateur de login ' . $vlogin . " a bien été supprimée.</p>";
    require File::build_path(array("view",static::$object,"list.php"));
?>
