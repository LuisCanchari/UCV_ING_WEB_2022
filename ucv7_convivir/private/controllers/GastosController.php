<?php
class GastosController extends Controller

{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio_id = Auth::getCondominio_id();
        $gasto =  new Gasto();
        $query = "select * from documentos where condominio_id = :condominio_id";
        $arr['condominio_id'] = $condominio_id;

        $data = $gasto->query($query, $arr);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Gastos', 'gastos'];

        $this->view('gastos\index', [
            'rows' => $data,
            'crumbs' => $crumbs
        ]);
    }

    public function create()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Gastos', 'gatos'];
        $crumbs[] = ['Nuevo', 'gastos/create'];

        if (Auth::access('super_admin')) {
            $this->view('gastos\create', [
                'crumbs' => $crumbs,
                'errors' => $errors
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function show($id = null)
    {
        $this->view('gastos\show');
    }

    public function edit($id = null)
    {
        $this->view('gastos\edit');
    }
    public function store()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $gasto = new Gasto();

            if ($gasto->validate($_POST)) {
                $gasto->insert($_POST);
                $this->redirect('gastos');
            } else {
                $errors = $gasto->errors;
            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Gastos', 'gastos'];
        $crumbs[] = ['Nuevo', 'gastos/create'];

        $this->view('gastos\create', [
            'crumbs' => $crumbs,
            'errors' => $errors
        ]);

    }

    public function update()
    {
        $this->redirect('viviendas');
    }

    public function destroy($id = null)
    {
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $gasto = new Gasto();

        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $gasto->delete($id);
            $this->redirect('gastos');
        }

        $row = $gasto->where('id', $id);
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Documentos', 'gastos'];
        $crumbs[] = ['Delete', 'gastos/destroy'];

        if (Auth::access('super_admin')) {
            $this->view('gastos/delete', [
                'row' => $row,
                'crumbs' => $crumbs,
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function report()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        
        require_once __DIR__ . '/../vendor/autoload.php';

        $condominio_id = Auth::getCondominio_id();
        $gasto =  new Gasto();
        $data = $gasto->where('condominio_id', $condominio_id);
        $parametros['gastos']=$data;

        $condominio =  new Condominio();
        $data = $condominio->first('id', $condominio_id);
        $parametros['condominio'] =$data;
        
        
        ob_start();
            $this->view('gastos/report', $parametros);
        $html = ob_get_clean();
        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function gastosJSON($condominio_id = null){
       header('Content-Type: application/json');

        $metodo = $_SERVER['REQUEST_METHOD'];
        $gasto =  new Gasto();
        switch($metodo){
           case 'GET':
                if ($condominio_id){
                    $query = "select * from documentos where condominio_id = :condominio_id";
                    $data = $gasto->query($query, ['condominio_id' => $condominio_id]);
                }else{
                    $query = "select * from documentos";
                    $data = $gasto->query($query);
                }
                break;

           case 'POST':
                
            
                break;
           case 'PUT': break;
       }
      
        http_response_code(200); 
        echo json_encode(['data'=>$data]);
    }
}
