<?php
    $tid = htmlspecialchars($id);
    echo '<p> Le trajet d\'id ' . $tid . " a bien été supprimée.</p>";
    require File::build_path(array("view",static::$object,"list.php"));
?>
