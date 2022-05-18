<?php
class Conectar{
    private $conexion;
    public static function conexion(){
        $conexion = new mysqli("localhost", "root","P4ss_mysql","db_mvc");
        return $conexion;
    }
}