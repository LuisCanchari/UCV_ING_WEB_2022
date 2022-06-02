<?php
$usuario = "Julian";
echo $usuario;
?>
<h1>Pagina 1</h1>
<ul>
<li>
    <a href="pagina2.php?c=<?php echo $usuario;?>">Pagina 2</a>
</li>
</ul>