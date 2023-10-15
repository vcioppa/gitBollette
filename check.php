<?php
session_start();
if (!$_SESSION['autorizzato']) {
  echo "<h1>Area riservata - accesso negato</h1>";
  die;
}
?>