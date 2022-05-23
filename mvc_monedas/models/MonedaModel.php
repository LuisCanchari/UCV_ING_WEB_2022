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

        public function getMoneda($id){
            $sql =  "select * from monedas where id=$id";
            $resultado = $this->db->query($sql);
            $row = $resultado->fetch_assoc();
            return $row;
        }

        public function insertar($codigo, $nombre, $pais, $factor){
            $sql =  "INSERT INTO monedas (codigo, nombre, pais, factor) VALUES ('$codigo', '$nombre', '$pais', '$factor')";
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function actualizar($id, $codigo, $nombre, $pais, $factor){
            $sql =  "UPDATE monedas SET 
            codigo = '$codigo',
            nombre = '$nombre', 
            pais = '$pais',
            factor = $factor
            WHERE id = '$id'";
            
            $resultado = $this->db->query($sql);
            return $resultado;
        }

        public function eliminar($id){
            $sql =  "DELETE FROM  monedas WHERE  id = '$id'";
            $resultado = $this->db->query($sql);
            return $resultado;
        }
    }
?>