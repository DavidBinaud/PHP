<?php
    foreach ($tab_t as $t){
        $tIdURL = rawurlencode($t->get('id'));
        $tId = htmlspecialchars($t->get('id'));
        echo <<<EOT
        	<p> Trajet d' Id <a href=index.php?action=read&controller=trajet&id=$tIdURL > $tId </a> 
        	   --(<a href=index.php?action=delete&controller=trajet&id=$tIdURL >Supprimer</a>)</p>
EOT;
    }
    echo "<p> <a href=\"index.php?action=create&controller=trajet\" >Créer un Trajet</a></p>";
?>