<?php
include("../login/check.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bollette - elenco</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Bollette</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="inserisci.php">Inserisci bolletta</a></li>
	  <li>Scegli bolletta:</li>
	</ul>
	<!--<ul class="nav navbar-nav">
		<li>
			Scegli bolletta:
		</li>
	</ul>-->
		
	<form action='' method=post>
		<ul class="nav navbar-nav">
		<select name="bolletta" class="form-control">
					<option>Tutte</option>
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
			</ul>
			<ul class="nav navbar-nav">
				&nbsp;&nbsp;Scegli anno:&nbsp;
			</ul>
			<ul class="nav navbar-nav">
				<select name="anno" class="form-control">
					<option>Tutti</option>
					<option value="2023">2023</option>
					<option value="2022">2022</option>
				</select>
			</ul>
			<ul class="nav navbar-nav">
				&nbsp;&nbsp;
				<input type=submit name=boll value=Invia>
			</ul>
	</form>
	
	
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrati </a></li>-->
      <li><a href="../login/destroy.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Bolletta</th>
				<th>Scadenza</th>
				<th>Importo</th>
				<th>Tipo Pagamento</th>
				<th>Pagata</th>
				<th>Note</th>
			</tr>
			<?php
			$arc=fopen("bollette.txt","r");
			$i=0;
            $totale=0.0;
			while(!feof($arc)){
				
				$i++;
				$riga=fgets($arc);
                if(strlen($riga)!=0)
                {
                list($bolletta, $scadenza, $importo, $pagamento, $pagato, $note)=explode("|",$riga);
				$totale=$totale+(float)$importo;
				
			?>
            
			<tr>
				<td><?php echo "$i"; ?></td>
				<td><?php echo "$bolletta"; ?></td>
                <td><?php echo "$scadenza"; ?></td>
				<td><?php echo "€ $importo"; ?></td>
				<td><?php echo "$pagamento"; ?></td>
				<td><?php echo "$pagato\n"; ?></td>
				<td><?php echo "$note\n"; ?></td>
				<td><a href="update.php?id=<?php echo $i; ?>" class="btn btn-primary">Modifica</a> <a href="cancella.php?id=<?php echo $i; ?>" class="btn btn-danger">Cancella</a></td>
			</tr>
			<?php }
            }
			?>
			<tr>
				<td></td>
				<td></td>
                <td></td>
				<td><?php echo "€ $totale"; ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php
            fclose($arc);
            ?>
		</table>
	</div>
</div>
</body>

</html>