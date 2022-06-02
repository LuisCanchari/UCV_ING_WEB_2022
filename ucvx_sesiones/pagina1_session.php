<?php
session_start();
$_SESSION["usuario"] = "Juan";
?>

<h1>Pagina 1</h1>
<h1><?=$_SESSION["usuario"]?></h1>
<a href="pagina2_session.php">Pagina 2</a>