<?php
	echo <<<EOT
	<table style="border: 1px solid #333;">
		<thead>
	        <tr>
	            <th colspan="2" style="text-align:right;">Table des Voitures</th>
	        </tr>
	    </thead>
	    <tbody >
			<tr >
    			<th>Immatriculation</th>
    			<th>Marque</th>
    			<th>Couleur</th>
			<tr>
EOT;

	foreach ($tab_v as $v) {
		$vImmatriculation = htmlspecialchars($v->get('immatriculation'));
    	$vImmatriculationURL = rawurlencode($v->get('immatriculation'));
    	$vMarque = htmlspecialchars($v->get('marque'));
    	$vCouleur = htmlspecialchars($v->get('couleur'));
	    echo <<<EOT
	    	<tr>
    			<td>$vImmatriculation (<a href=index.php?action=update&controller=voiture&immatriculation=$vImmatriculationURL >MaJ</a>)</td>
    			<td>$vMarque</td>
    			<td>$vCouleur</td>
			<tr>
EOT;
	}
	echo <<<EOT
		</tbody>
	</table>
EOT;

?>