<?php
class PersonasController extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $query = "select * from personas";
        $persona =  new Persona();

        $data = $persona->query($query);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Personas', 'personas'];

        $this->view('personas\index', [
            'rows' => $data,
            'crumbs' => $crumbs
        ]);
    }

    public function create()
    {
        
        $this->view('viviendas\create');
    }

    public function show($id=null)
    {
        
        $this->view('viviendas\show');
    }

    public function edit($id=null)
    {
        $this->view('viviendas\edit');
    }

    public function store()
    {
        $this->redirect('viviendas');
    }

    public function update()
    {
        $this->redirect('viviendas');
    }

    public function destroy()
    {
        $this->redirect('viviendas');
    }

    public function storeJSON()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
       
        $errors =  array();
        $persona = new Persona();

        if (count($_POST) > 0) {
            
            if ($persona->validate($_POST)){
                $persona_id = $persona->insert($_POST);
            }else
            $errors = $persona->errors;    
        }
        $resultado = $persona->findAll();
        $resultado['status'] = 'Con exito';

        if (!$errors){
            $resultado['status'] = 'Con errores';
        }
        http_response_code(200); 
        echo json_encode($resultado);

    }

}
