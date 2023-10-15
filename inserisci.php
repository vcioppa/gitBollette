<?php
 
 if(isset($_POST['invio'])){
     $bolletta = filter_var($_POST['bolletta'], FILTER_SANITIZE_STRING);
	 $scadenza = filter_var($_POST['scadenza'], FILTER_SANITIZE_STRING);
	 $importo =$_POST['importo'];
	 $pagamento = filter_var($_POST['pagamento'], FILTER_SANITIZE_STRING);
     $pagato = filter_var($_POST['pagato'], FILTER_SANITIZE_STRING);
     $note = filter_var($_POST['note'], FILTER_SANITIZE_STRING);
	 $riga = $bolletta."|".$scadenza."|".$importo."|".$pagamento."|".$pagato."|".$note."\n";
     $archivio=fopen("bollette.txt", "a+") or die ("Impossibile aprire il archivio");
     $newriga = filter_var($riga, FILTER_SANITIZE_STRING);
	 fputs($archivio,$newriga);
	 fclose($archivio);
	 header('location:visualizza.php');
	 
}
?>
<?php include("check.php"); ?>
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
			<h2>Inserimento bolletta</h2>
			<!--*<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Nome prodotto</label>
			    <div class="col-sm-10">
			      <input type="text" name="prodotto"  class="form-control" id="input1" placeholder="Nome Prodotto" />
			    </div>
			</div>-->

			
			<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Bolletta</label>
			<div class="col-sm-10">
				<select name="bolletta" class="form-control">
					<option>Bolletta</option>
					<option value="Luce">Luce</option>
					<option value="Gas">Gas</option>
					<option value="Spazzatura">Spazzatura</option>
					<option value="Acqua">Acqua</option>
					<option value="Rangers">Rangers</option>
                    <option value="Sky">Sky</option>
					<option value="Fastweb">Fastweb</option>
                    <option value="CalcioLu">Calcio</option>
                    <option value="Dazn">Dazn</option>
					<option value="bolloAuto">Bollo Auto</option>
					<option value="assicurazioneAuto">Assicurazione Auto</option>
					<option value="condominio">Condominio</option>
					<option value="Varie">Varie</option>
				</select>
			</div>
			</div>
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Scadenza</label>
			    <div class="col-sm-10">
			      <input type="date" name="scadenza"  class="form-control" id="input1" placeholder="Scadenza">
				</div>
             </div>
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Importo</label>
			    <div class="col-sm-10">
			      <input type="text" name="importo"  class="form-control" id="input1" placeholder="Importo" />
			    </div>
			</div>
            <div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Modalità pagamento</label>
			<div class="col-sm-10">
				<select name="pagamento" class="form-control">
					<option>Modalità pagamento</option>
					<option value="contanti">Contanti</option>
					<option value="bonifico">Bonifico</option>
					<option value="carta">Carta di Credito</option>
					<option value="addebito">Addebito sul conto</option>
				</select>
			</div>
			</div>
            <div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Pagato</label>
			<div class="col-sm-10">
				<select name="pagato" class="form-control">
					<option>Pagato</option>
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</div>
			</div>
             <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Note</label>
			    <div class="col-sm-10">
			      <input type="text" name="note"  class="form-control" id="input1" placeholder="Note" />
			    </div>
			</div>
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Invia" name="invio"/>
		</form>
	</div>
</div>
</body>
</html>
