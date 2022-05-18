<?php
require_once "./config/config.php";
require_once "./config/config.php";
require_once "./config/database.php";
require_once "./controllers/MonedaController.php";
//$control = new MonedaController();
//$control->index();

if (isset($_GET['c'])){
    $controlador = cargarControlador($_GET['c']);
}else{
    $controlador = $_GET['c'];
}

