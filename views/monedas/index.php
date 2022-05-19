<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedas</title>
</head>
<body>
<h2><?php echo $data['titulo']?></h2>

<a href="index.php?c=moneda&a=create">Agregar</a>
<table border="1" width="80%" cellspacing="0">
    <thead>
        <th>codigo</th>
        <th>Nombre</th>
        <th>Pais</th>
        <th>Factor</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php foreach ($data["monedas"] as $dato) {
        echo "<tr>";
        echo "<td>". $dato['codigo']."</td>";
        echo "<td>". $dato['nombre']."</td>";
        echo "<td>". $dato['pais']."</td>";
        echo "<td>". $dato['factor']."</td>";
        echo "<td> <a href='index.php?c=moneda&a=edit&id=".$dato['id']."'>Editar</a>";
        echo "<td> <a href='index.php?c=moneda&a=destroy&id=".$dato['id']."'>Eliminar</a>";

        echo "</tr>";
    }?>

    </tbody>
</table>
</body>
</html>