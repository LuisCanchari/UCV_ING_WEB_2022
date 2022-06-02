<?php
class UsersController extends Controller
{

    public function index()
    {
        //echo "Controller Home index";
        // code...
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio_id = Auth::getCondominio_id();
        $query = "select * from users where condominio_id = :condominio_id";
        $arr['condominio_id'] = $condominio_id;
        //$data = $user->query($query,$arr);


        // code...

        $usuario =  new User();

        //$data = $usuario->findAll();
        $data = $usuario->query($query,$arr);

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
            echo "hola";
            $this->redirect('login');
        }
        $this->redirect('signup');

    }

    public function show($id = null)
    {
        //echo "Controller Home index";
        $this->view('users\show');
    }
    public function edit($id = null)
    {
        
        $this->view('users\edit');
    }

    public function store()
    {
        
        $this->view('users\create');
    }

    public function destroy()
    {
        
        $this->view('users\create');
    }

    public function switch_condominio($id=null)
    { 
        if(Auth::access('super_admin')){
			Auth::switch_condominio($id);
		}
 		
 		$this->redirect('condominios');

    }

}
