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
    
    <form id="nuevo" name="nuevo" method="POST" action="index.php?c=moneda&a=update" autocomplete="off">
        <input type="hidden" id="id" name="id" value="<?php echo $data['moneda']['id'];?>"> <br>
        Codigo: <input type="text" id="codigo" name="codigo" value="<?php echo $data['moneda']['codigo'];?>"> <br>
        Nombre: <input type="text" id="nombre" name="nombre" value="<?php echo $data['moneda']['nombre'];?>"> <br>
        Pais: <input type="text" id="pais" name="pais" value="<?php echo $data['moneda']['pais'];?>"> <br>
        Factor: <input type="number" id="factor" name="factor" step="0.01" value="<?php echo $data['moneda']['factor'];?>"> <br>
        <input type="submit" id="guardar" name="guardar" value="Guardar">
    </form>

    <a href="index.php">Home</a>
</body>

</html>