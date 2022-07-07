<?php
class EstadisticasController extends Controller{
    public function index()
	{
		$this->view('estadisticas\index');
	}

    public function gasto_mensual_JSON($condominio, $anio=null)
	{  header('Content-Type: application/json');
        
        $gasto = new Gasto;
        $query = "call usp_condominio_gastos_mesual (:anio,:condominio)";
        $data = $gasto->query($query, [':anio'=>$anio, ':condominio'=>$condominio]);
        echo json_encode(['data'=>$data]);
	}

    public function gasto_portipodocumento_JSON($condominio, $anio=null)
	{  header('Content-Type: application/json');
        
        $gasto = new Gasto;
        $query = "call usp_condominio_gasto_por_documento (:anio,:condominio)";
        $data = $gasto->query($query, [':anio'=>$anio, ':condominio'=>$condominio]);
        echo json_encode(['data'=>$data]);
	}
}
