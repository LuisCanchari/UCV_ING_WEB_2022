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
    <h2>Monedas</h2>

    <form id="nuevo" name="nuevo" method="POST" action="" autocomplete="off">
        Codigo: <input type="text" id="codigo" name="codigo"> <br>
        Nombre: <input type="text" id="nombre" name="nombre"> <br>
        Pais: <input type="text" id="pais" name="pais"> <br>
        Factor: <input type="number" id="factor" name="factor" step="0.01"> <br>
        <input type="submit" id="guardar" name="guardar" value="Guardar">
    </form>
</body>

</html>