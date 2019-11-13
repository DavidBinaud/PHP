
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    			<th>Action</th>
			<tr>

<?php
	foreach ($tab_v as $v) {
		$vImmatriculation = htmlspecialchars($v->get('immatriculation'));
    	$vImmatriculationURL = rawurlencode($v->get('immatriculation'));
    	$vMarque = htmlspecialchars($v->get('marque'));
    	$vCouleur = htmlspecialchars($v->get('couleur'));
	    echo <<<EOT
	    	<tr>
    			<td>$vImmatriculation</td>
    			<td>$vMarque</td>
    			<td>$vCouleur</td>
    			<td>
    				<button onclick="window.location.href = 'index.php?action=delete&controller=voiture&immatriculation=$vImmatriculationURL';"><i class="fa fa-trash"></i></button>
					<button onclick="window.location.href = 'index.php?action=update&controller=voiture&immatriculation=$vImmatriculationURL';"><i class="fa fa-edit"></i></button>
    			</td>
			<tr>
EOT;
	}
	echo "</tbody>
	</table>";

?>