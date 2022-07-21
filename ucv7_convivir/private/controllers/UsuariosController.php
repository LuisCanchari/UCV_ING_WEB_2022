<?php
class UsuariosController extends Controller
{

    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio_id = Auth::getCondominio_id();
        $usuario =  new Usuario();
        $data = $usuario->where('condominio_id', $condominio_id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'users'];

        $this->view('usuarios\index', [
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
        $crumbs[] = ['Usuarios', 'usuarios'];
        $crumbs[] = ['Nuevo', 'usuarios/create'];

        if (Auth::access('super_admin')) {
            $this->view('usuarios\create', [
                'crumbs' => $crumbs,
                'errors' => $errors
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


        $usuario =  new Usuario();
        $data = $usuario->first('id', $id);


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'usuarios'];
        $crumbs[] = ['Details', 'usuarios/show/' . $id];

        $this->view(
            'usuarios\show',
            [
                'row' => $data,
                'crumbs' => $crumbs,

            ]
        );
    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $usuario =  new Usuario();
        $data = $usuario->first('id', $id);

        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'usuarios'];
        $crumbs[] = ['Details', 'usuarios/edit/' . $id];

        $this->view(
            'usuarios\edit',
            [
                'row' => $data,
                'crumbs' => $crumbs,
                'errors' => $errors
            ]
        );
    }

    public function store()
    {
        
        $errors =  array();
        if (count($_POST) > 0) {
            $persona = new Persona();
            $usuario =  new Usuario();
            if ($persona->validate($_POST)){
                if ($usuario->validate($_POST)) {
                    
                    $persona_id = $persona->insert($_POST);

                    $_POST['persona_id'] = $persona_id;
                    $_POST['date'] = date("Y-m-d H:i:s");
                    

                    $usuario->insert($_POST);

                    $this->redirect('usuarios');
                }else
                    $errors = $usuario->errors;    
            }else
            $errors = $persona->errors;    
        }

   
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'usuarios'];
        $crumbs[] = ['Details', 'usuarios/create'];

        $this->view(
            'usuarios\create',
            [
                'crumbs' => $crumbs,
                'errors' => $errors
            ]
        );
    }

    public function update($id = '')
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        $id = trim($id == '') ? Auth::getUser_id() : $id;
        $user = new Usuario();
        $data =  $user->first('id',$id);
        $persona = new Persona();


        if (count($_POST) > 0) {

            if (trim($_POST['password']) == "") {
                unset($_POST['password']);
                unset($_POST['password2']);
            }

            if ($user->validate($_POST, $id)) {
                if ($persona->validate($_POST, $data->id)){
                    if ($myimage = upload_image($_FILES)) {
                        $_POST['image'] = $myimage;
                    }
                    $_POST['date'] = date("Y-m-d H:i:s");
                    $user->update($id, $_POST);
                    $persona->update($data->id, $_POST);
                    $this->redirect('usuarios/show/' . $id);
                }else{
                    $errors = $persona->errors;    
                }
               
            } else {
                $errors = $user->errors;
            }
        }

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Users', 'usuarios'];
        $crumbs[] = ['Editar', 'users/edit'];

        $this->view('usuarios/edit', [
            'row' => $data,
            'crumbs' => $crumbs,
            'errors' => $errors
        ]);
    }

    public function destroy($id = '')
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $user = new Usuario();
        $errors = array();

        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $user->delete($id);
            $this->redirect('usuarios');
        }

        $row = $user->first('id', $id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Users', 'usuarios'];
        $crumbs[] = ['Delete', 'usuarios/destroy'];

        if (Auth::access('super_admin')) {
            $this->view('usuarios/delete', [
                'row' => $row,
                'crumbs' => $crumbs,
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function switch_condominio($id = null)
    {
        if (Auth::access('super_admin')) {
            Auth::switch_condominio($id);
        }

        $this->redirect('condominios');
    }
}
