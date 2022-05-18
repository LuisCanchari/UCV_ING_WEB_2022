<?php
    class MonedaModel{
        private $db;
        private $monedas;

        public function __construct(){
            $this->db= Conectar::conexion();
            $this->monedas = array();

        }
        public function getMonedas(){
            $sql =  "select * from monedas";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc()){
                $this->monedas[] = $row;
            }
            return $this->monedas;
        }
        public function insertar($codigo, $nombre, $pais, $factor){
            $sql =  "INSERT INTO monedas (codigo, nombre, pais, factor) 
                     VALUES ('$codigo', '$nombre', '$pais', '$factor')";
            $resultado = $this->db->query($sql);
        }
    }
?>