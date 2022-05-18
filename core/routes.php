<?php
    function cargarControlador($controlador){
        $nombreControloador = ucwords($controlador)."Controller";
        $archivoControloador = 'controllers/'.$controlador.'.php';

        if(!is_file($archivoControloador)){
            $archivoControloador = 'controllers/'.CONTROLADOR_PRINCIPAL.'.php';
        }
        require_once $archivoControloador;
        $control = new $nombreControloador();
        return $control;
    }
