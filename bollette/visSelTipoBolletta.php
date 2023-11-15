<select   onchange="fa altra roba" >


<?php 
$vet = file('tipoBolletta.txt');
asort($vet);
foreach($vet as $chiave => $valore)
{
	echo "<option value='$valore'>$valore</option>";	
}

?>
</select>
