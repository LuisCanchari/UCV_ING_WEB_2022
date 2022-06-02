<?php
session_start();
?>
<h1>Pagina 2</h1>
<h1><?=$_SESSION["usuario"]?></h1>
<a href="pagina1_session.php">Pagina 1</a>

<?php
//session_destroy();
?>