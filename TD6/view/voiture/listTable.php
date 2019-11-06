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
    			<th>Action</th>
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
    			<td>
    				<div class="dropdown">
  						<button class="dropbtn">Dropdown</button>
  						<div class="dropdown-content">
    						<a href="#">Link 1</a>
    						<a href="#">Link 2</a>
    						<a href="#">Link 3</a>
  						</div>
					</div>
					
    			</td>
			<tr>
EOT;
	}
	echo <<<EOT
		</tbody>
	</table>
EOT;

?>