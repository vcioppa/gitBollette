<?php
session_start();
session_unset();
session_destroy();
header('Location: index.php');
?>
<script language="JavaScript">
document.location.href = "login.php"
</script>