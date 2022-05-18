<?php
 require_once "models/MonedaModel.php";

class MonedaController{
    public function index(){
       $monedas = new MonedaModel();
        $data["titulo"] = "Monedas";
        $data["monedas"] = $monedas->getMonedas();

        require_once "views/monedas/index.php";
    }

    public function create(){
        $data["titulo"] = "Monedas";
        
        require_once "views/monedas/create.php";
    }

}