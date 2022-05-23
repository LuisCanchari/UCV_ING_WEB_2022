<?php
class UsersController extends Controller{

    public function index(){
        //echo "Controller Home index";
        // code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
	
		// code...

		$usuario =  new User();

		$data = $usuario->findAll();

        $crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Usuarios','users'];
        
        $this->view('users\index',[
			'rows'=>$data,
			'crumbs'=>$crumbs
		]);

    }

	public function create(){
        //echo "Controller Home index";
        $this->view('users\create');
    }

	public function show($id=null){
        //echo "Controller Home index";
        $this->view('users\show');
    }
	public function edit($id=null){
        //echo "Controller Home index";
        $this->view('users\edit');
    }

	

}