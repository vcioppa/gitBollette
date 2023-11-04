
<?php
include("../login/check.php");
if(!isset($_POST['ute']))
{

$barra= <<< seleziona
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
      <a class="navbar-brand" href="#">Utenti</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="insUtente.php">Inserisci utente</a></li>
	  <li>Scegli utente:</li>
	</ul>
	<!--<ul class="nav navbar-nav">
		<li>
			Scegli utente:
		</li>
	</ul>-->
		
	<form action='' method=post>
		<ul class="nav navbar-nav">
		<select name="utente" class="form-control">
					<option>Tutti</option>
					<option value="admin">Amministratore</option>
					<option value="utente">Utente</option>
				</select>
			</ul>
			
			<ul class="nav navbar-nav">
				&nbsp;&nbsp;
				<input type=submit name=ute value=Invia>
			</ul>
	</form>
	
	
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrati </a></li>-->
      <li><a href="../login/destroy.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>


seleziona;
echo $barra;
$intestazione = <<< intesta
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Cognome</th>
				<th>Nome</th>
				<th>Username</th>
				<th>Password</th>
				<th>Ruolo</th>
			</tr>
intesta;
	echo $intestazione;
	
			
			$arc=fopen("bollette.txt","r");
			$i=0;
            $totale=0.0;
			while(!feof($arc)){
				
				$i++;
				$riga=fgets($arc);
                if(strlen($riga)!=0)
                {
					list($bolletta1, $scadenza, $importo, $pagamento, $pagato, $note)=explode("|",$riga);
					
            ?>
			<tr>
				<td><?php echo "$i"; ?></td>
				<td><?php echo "$bolletta1"; ?></td>
                <td><?php echo "$scadenza"; ?></td>
				<td><?php echo "€ $importo"; ?></td>
				<td><?php echo "$pagamento"; ?></td>
				<td><?php echo "$pagato\n"; ?></td>
				<td><?php echo "$note\n"; ?></td>
				<td><a href="modBolletta.php?id=<?php echo $i; ?>" class="btn btn-primary">Modifica</a> <a href="cancBolletta.php?id=<?php echo $i; ?>" class="btn btn-danger">Cancella</a></td>
			</tr>
			<?php 
				$totale=$totale+(float)$importo;	
				}
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
}
            

else

{
	$operatore=$_POST['bolletta'];
	
	$anno=$_POST['anno'];
	$intestazione = <<< intesta
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
intesta;
	echo $intestazione;
	
			
			$arc=fopen("bollette.txt","r");
			$i=0;
            $totale=0.0;
			while(!feof($arc)){
				
				$i++;
				$riga=fgets($arc);
                if(strlen($riga)!=0)
                {
					list($bolletta1, $scadenza, $importo, $pagamento, $pagato, $note)=explode("|",$riga);
					$scadenza1=date_create($scadenza);
					$anno1=date_format($scadenza1,"Y");
					if (trim($operatore)==trim($bolletta1) && $anno==$anno1)
					{
						$totale=$totale+(float)$importo;
						$scad=date_format($scadenza1,"d/m/Y");
            ?>
			<tr>
				<td><?php echo "$i"; ?></td>
				<td><?php echo "$bolletta1"; ?></td>
                <td><?php echo "$scad"; ?></td>
				<td><?php echo "€ $importo"; ?></td>
				<td><?php echo "$pagamento"; ?></td>
				<td><?php echo "$pagato\n"; ?></td>
				<td><?php echo "$note\n"; ?></td>
				<td><a href="modBolletta.php?id=<?php echo $i; ?>" class="btn btn-primary">Modifica</a> <a href="cancBolletta.php?id=<?php echo $i; ?>" class="btn btn-danger">Cancella</a></td>
			</tr>
			<?php 
					}
				}
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
}
            ?>
		</table>
	</div>
</div>
</body>

</html>