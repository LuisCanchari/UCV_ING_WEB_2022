<?php
 require_once "models/MonedaModel.php";

class MonedaController{
    public function index(){
       $monedas = new MonedaModel();
       $data["titulo"] = "Lista Monedas";
       $data["monedas"] = $monedas->getMonedas();
       require_once "views/monedas/index.php";
    }

    public function create(){
        $data["titulo"] = "Crear Moneda";
        require_once "views/monedas/create.php";
    }

    public function store(){
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $pais = $_POST['pais'];
        $factor = $_POST['factor'];

        $moneda = new MonedaModel();
        $moneda->insertar($codigo, $nombre,$pais,$factor);
        $this->index();
    }

    public function update(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $codigo = $_POST['codigo'];
        $pais = $_POST['pais'];
        $factor = $_POST['factor'];

        $moneda = new MonedaModel();
        $moneda->actualizar($id, $codigo, $nombre,$pais,$factor);
        $this->index();
    }

    public function edit($id){
        $moneda = new MonedaModel();
        $data["titulo"] = "Actualizar Moneda";
        $data["moneda"] = $moneda->getMoneda($id);
        require_once "views/monedas/edit.php";
    }

    public function destroy($id){
        $moneda = new MonedaModel();
        $moneda->eliminar($id);
        $this->index();
    }
}