<?php
	if(isset($_POST['mod'])){
		$arc=fopen("bollette.txt","r");
		$righe=file("bollette.txt");
		$id=$_POST['id'];
		$prodotto=$_POST['prodotto'];
		$categoria=$_POST['categoria'];
		$quantita=$_POST['quantita'];
		$prezzo=$_POST['prezzo'];
		$negozio=$_POST['negozio'];
		foreach ($righe as $key => $riga){
			//list($a, $b, $c, $d, $e)=explode("|", $riga);
			$key++;
			if($key==$id){
				$key--;
				$righe[$key]=$prodotto."|".$categoria."|".$quantita."|".$prezzo."|".$negozio."\n";
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
			list($prodotto, $categoria, $quantita, $prezzo, $negozio)=explode("|",$riga);
		}
	}
	fclose($arc);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Lista della bollette</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
<form action='' method="post" class="form-horizontal col-md-6 col-md-offset-3">
	<h2>Aggiornamento lista della bollette</h2>
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Prodotto</label>
	    <div class="col-sm-10">
	      <input type="text" name="prodotto"  class="form-control" id="input1" value="<?php echo $prodotto ?>" placeholder="Prodotto" />
	    </div>
	</div>

	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Categoria</label>
	    <div class="col-sm-10">
	      <input type="text" name="categoria"  class="form-control" id="input1" value="<?php echo $categoria ?>" placeholder="Categoria" />
	    </div>
	</div> 
	
	<div class="form-group">
	    <label for="input1" class="col-sm-2 control-label">Quantità</label>
	    <div class="col-sm-10">
	      <input type="text" name="quantita"  class="form-control" id="input1" value="<?php echo $quantita ?>" placeholder="Quantità" />
	    </div>
	</div>

	<div class="form-group">
	<label for="input1" class="col-sm-2 control-label">Prezzo</label>
	<div class="col-sm-10">
	  <label>
	    <div class="col-sm-10">
	      <input type="text" name="prezzo"  class="form-control" id="input1" value="<?php echo $prezzo ?>" placeholder="Quantità" />
	    </div>
	</div>
	</div>

	<div class="form-group">
	<label for="input1" class="col-sm-2 control-label">Negozio</label>
	<div class="col-sm-10">
	  <label>
	    <div class="col-sm-10">
	      <input type="text" name="negozio"  class="form-control" id="input1" value="<?php echo $negozio ?>" placeholder="Negozio" />
	    </div>
	</div>
	</div> 

	
	<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" name="mod" value="Aggiorna" />

	</form>
	</div>
</div>
</body>
</html>