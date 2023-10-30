<?php
	include("../login/check.php");
    $id = $_GET['id'];
    $id--;
	
	$righe=file("bollette.txt");
	unset($righe[$id]);
					
	
	$archivio=fopen("bollette.txt", "w");
	foreach($righe as $key => $riga){
		fputs($archivio, $riga);
	}
	fclose($archivio);
	header('location:visBollette.php');
?>
 
