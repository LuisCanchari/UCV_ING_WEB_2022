<?php
class UsersController extends Controller
{

    public function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        die();

        $condominio_id = Auth::getCondominio_id();
        $query = "select * from users where condominio_id = :condominio_id";
        $arr['condominio_id'] = $condominio_id;

        $usuario =  new User();
        $data = $usuario->query($query, $arr);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'users'];

        $this->view('users\index', [
            'rows' => $data,
            'crumbs' => $crumbs
        ]);
    }

    public function create()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        if (!Auth::logged_in()) {
            $this->redirect('login');
        }
        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'usuarios'];
        $crumbs[] = ['Nuevo', 'usuarios/create'];

        if (Auth::access('super_admin')) {
            $this->view('users\create', [
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


        $usuario =  new User();
        $data = $usuario->first('id', $id);


        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'users'];
        $crumbs[] = ['Details', 'users/show/' . $id];

        $this->view(
            'users\show',
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

        $usuario =  new User();
        $data = $usuario->first('id', $id);

        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Usuarios', 'users'];
        $crumbs[] = ['Details', 'users/edit/' . $id];

        $this->view(
            'users\edit',
            [
                'row' => $data,
                'crumbs' => $crumbs,
                'errors' => $errors
            ]
        );
    }

    public function store()
    {

        $this->view('users\create');
    }

    public function update($id = '')
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        $id = trim($id == '') ? Auth::getUser_id() : $id;
        $user = new User();


        if (count($_POST) > 0) {

            if (trim($_POST['password']) == "") {
                unset($_POST['password']);
                unset($_POST['password2']);
            }

            if ($user->validate($_POST, $id)) {
                if ($myimage = upload_image($_FILES)) {
                    $_POST['image'] = $myimage;
                }

                $_POST['date'] = date("Y-m-d H:i:s");

                $user->update($id, $_POST);

                $this->redirect('users/show/' . $id);
            } else {
                $errors = $user->errors;
            }
        }

        $data = $user->first('id', $id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Users', 'users'];
        $crumbs[] = ['Editar', 'users/edit'];

        $this->view('users/edit', [
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

        $user = new User();
        $errors = array();

        if(count($_POST) > 0 && Auth::access('super_admin'))
 		{
            $user->delete($id);
 			$this->redirect('users');
  		}

        $row = $user->first('id', $id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Users', 'users'];
        $crumbs[] = ['Delete', 'users/destroy'];

        if(Auth::access('super_admin')){
			$this->view('users/delete',[
				'row'=>$row,
	 			'crumbs'=>$crumbs,
			]);
		}else{
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
