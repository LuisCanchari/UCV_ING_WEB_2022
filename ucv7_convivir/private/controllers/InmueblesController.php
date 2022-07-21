<?php
class InmueblesController extends Controller

{
    public function index()
    {

        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio_id = Auth::getCondominio_id();
        $inmueble =  new Inmueble();
        $inmueble = $inmueble->where('condominio_id', $condominio_id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];

        $this->view('inmuebles\index', [
            'rows' => $inmueble,
            'crumbs' => $crumbs,
        ]);
    }

    public function create()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $persona =  new Persona;
        $personas  = $persona->findAll();

        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Nuevo', 'inmuebles/create'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles\create', [
                'crumbs' => $crumbs,
                'errors' => $errors,
                'rows' => $personas
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function show($id = null)
    {

        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $inmuebe = new Inmueble;
        $row = $inmuebe->findById($id);


        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Modificar', 'inmuebles/edit'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles\show', [
                'row' => $row,
                'crumbs' => $crumbs,
                'errors' => $errors
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $inmuebe = new Inmueble;
        $row = $inmuebe->findById($id);

        $persona =  new Persona;
        $personas  = $persona->findAll();


        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Modificar', 'inmuebles/edit'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles\edit', [
                'row' => $row,
                'personas' => $personas,
                'crumbs' => $crumbs,
                'errors' => $errors
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function store()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $inmueble = new Inmueble();

            if ($inmueble->validate($_POST)) {
                $propietario['inmueble_id'] = $inmueble->insert($_POST);

                if (isset($_POST['persona_id']) && is_numeric($_POST['persona_id'])) {
                    $propietario['persona_id'] =  $_POST['persona_id'];
                    $inmueble->set_propietario($propietario);
                }
                $this->redirect('inmuebles');
            } else {
                $errors = $inmueble->errors;
            }
        }

        $persona =  new Persona;
        $personas  = $persona->findAll();

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Nuevo', 'inmuebles/create'];

        $this->view('inmuebles\create', [
            'crumbs' => $crumbs,
            'errors' => $errors,
            'rows' => $personas,
        ]);
    }

    public function update($id = null)
    {    
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $inmueble = new Inmueble();
           
            if ($inmueble->validate($_POST)) {
                $inmueble->update($id, $_POST);
                
                if (isset($_POST['persona_id']) && is_numeric($_POST['persona_id'])) {
                    
                    $propietario['inmueble_id'] =  $id;
                    $propietario['persona_id'] =  $_POST['persona_id'];
                    $inmueble->set_propietario($propietario);
                 
                }
                $this->redirect('inmuebles');
            } else {
                $errors = $inmueble->errors;
            }
        }

        $this->redirect('inmuebles');
    }

    public function destroy($id = null)
    {
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $inmueble = new Inmueble();

        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $inmueble->delete($id);
            $this->redirect('inmuebles');
        }

        $row = $inmueble->where('id', $id);
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Delete', 'inmuebles/destroy'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles/delete', [
                'row' => $row,
                'crumbs' => $crumbs,
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function residente_add($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $inmueble = new Inmueble();
        $row = $inmueble->findById($id);
        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin')) {

            $persona = new Persona();
            if ($persona->validate($_POST)) {
                $persona_id = $persona->insert($_POST);
                $residente['persona_id'] = $persona_id;
                $residente['inmueble_id'] = $id;
                $inmueble->add_residente($residente);
                $this->redirect('inmuebles/show/' . $id);
            }else{
                $errors = $persona->errors;    
            }
        }
        
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Residente add', 'inmuebles/residente_add'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles\residente-add', [
                'row' => $row,
                'crumbs' => $crumbs,
                'errors' => $errors
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function residente_del($residente_id)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $residente =  new Residente();
        $row = $residente->findById($residente_id);
        
        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $residente->delete($residente_id);

            $this->redirect('inmuebles/show/'.$row->inmueble_id);
        }
        
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Inmuebles', 'inmuebles'];
        $crumbs[] = ['Residente add', 'inmuebles/residente_add'];

        if (Auth::access('super_admin')) {
            $this->view('inmuebles\residente-del', [
                'row' => $row,
                'crumbs' => $crumbs
            ]);
        } else {
            $this->view('access-denied');
        }
    }
}
