<?php
 
 if(isset($_POST['invio'])){
    $descrizione = filter_var($_POST['descrizione'], FILTER_SANITIZE_STRING);
	$archivio=fopen("tipoBolletta.txt", "a") or die ("Impossibile aprire il archivio");
    $riga=ucfirst($descrizione)."\n";
	$newriga = filter_var($riga, FILTER_SANITIZE_STRING);
	fputs($archivio,$newriga);
	fclose($archivio);
	header('location:insTipoBolletta.php');
}
?>
<?php //include("../login/check.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Elenco Bollette - Inserimento bolletta</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container" >
	<div class="row" class="col-sm-3">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Inserimento tipologia bolletta</h2>
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Descrizione</label>
			    <div class="col-sm-10">
			      <input type="text" name="descrizione"  class="form-control" id="input1" placeholder="descrizione" checked/>
			    </div>
			</div>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Invia" name="invio"/>
		</form>
	</div>
</div>
</body>
</html>
