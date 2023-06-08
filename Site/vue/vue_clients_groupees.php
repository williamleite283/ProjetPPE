<table border="1">
	<tr>
		<td>id</td>
		<td>nom</td>
		<td>adresse</td>
		<td>numero_telephone</td>
		
		</tr>
	<?php
	foreach ($lesResultats as $unResultat) {
	echo "<tr>";
	echo "<td>".$unResultat['nom']."</td>"; 
	echo "<td>".$unResultat['prenom']."</td>"; 
	echo "<td>".$unResultat['nb']."</td>"; 
	echo "</tr>";
	}
	?>
</table>










