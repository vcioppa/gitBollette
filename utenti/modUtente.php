<?php
	if(isset($_POST['mod'])){
		$arc=fopen("bollette.txt","r");
		$righe=file("bollette.txt");
		$id=$_POST['id'];
		$bolletta=$_POST['bolletta'];
		$scadenza=$_POST['scadenza'];
		$importo=$_POST['importo'];
		$pagamento=$_POST['pagamento'];
		$pagato=$_POST['pagato'];
		$note=$_POST['note'];
		foreach ($righe as $key => $riga){
			//list($a, $b, $c, $d, $e)=explode("|", $riga);
			$key++;
			if($key==$id){
				$key--;
				$righe[$key]=$bolletta."|".$scadenza."|".$importo."|".$pagamento."|".$pagato."|".$note."\n";
			}
		}
		fclose($arc);
		$archivio=fopen("bollette.txt", "w+");
		foreach($righe as $key => $riga){
			fputs($archivio, $riga);
		}
		fclose($archivio);
		header('Location:visBollette.php');
	} 
	$id = $_GET['id'];
	$arc=fopen("bollette.txt","r");
	$i=0;
	while(!feof($arc)){
		$i++;
		$riga=fgets($arc);
		if(strlen($riga)!=0 && $i==$id)
		{
			list($bolletta, $scadenza, $importo, $pagamento, $pagato, $note)=explode("|",$riga);
		}
	}
	fclose($arc);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista della bolletta</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
<form action='' method="post" class="form-horizontal col-md-6 col-md-offset-3">
	<h2>Aggiornamento lista della bolletta</h2>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Bolletta</label>
	    <div class="col-sm-10">
	      <input type="text" name="bolletta"  class="form-control" id="input1" value="<?php echo $bolletta ?>">
	    </div>
	</div>

	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Scadenza</label>
	    <div class="col-sm-10">
	      <input type="text" name="scadenza"  class="form-control" id="input1" value="<?php echo $scadenza ?>" placeholder="Scadenza" />
	    </div>
	</div> 
	
	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">importo</label>
	    <div class="col-sm-10">
	      <input type="text" name="importo"  class="form-control" id="input1" value="<?php echo $importo ?>" placeholder="Importo" />
	    </div>
	</div>

	<div class="form-group">
	<label for="input1" class="col-sm-2 control-label">Pagamento</label>
	<div class="col-sm-10">
	  <label>
	    <div class="col-sm-10">
	      <input type="text" name="pagamento"  class="form-control" id="input1" value="<?php echo $pagamento ?>" placeholder="Pagamento" />
	    </div>
	</div>
	</div>

	<div class="form-group">
	<label for="input1" class="col-sm-2 control-label">Pagato</label>
	<div class="col-sm-10">
	  <label>
	    <div class="col-sm-10">
	      <input type="text" name="pagato"  class="form-control" id="input1" value="<?php echo $pagato ?>" placeholder="Pagato" />
	    </div>
	</div>
	</div> 

<div class="form-group">
	<label for="input1" class="col-sm-2 control-label">Note</label>
	<div class="col-sm-10">
	  <label>
	    <div class="col-sm-10">
	      <input type="text" name="note"  class="form-control" id="input1" value="<?php echo $note ?>" placeholder="Note" />
	    </div>
	</div>
	</div> 
	
	<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" name="mod" value="Aggiorna" />

	</form>
	</div>
</div>
</body>
</html>