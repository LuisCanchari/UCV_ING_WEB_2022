<?php
class CondominiosController extends Controller
{
    public function index()
    {

        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio =  new Condominio();

        $data = $condominio->findAll();

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Condominio', 'condominios'];

        $this->view('condominios\index', [
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
        $crumbs[] = ['Condominios', 'condominios'];
        $crumbs[] = ['Nuevo', 'condominios/create'];

        if (Auth::access('super_admin')) {
            $this->view('condominios\create', [
                'crumbs' => $crumbs,
                'errors' => $errors
            ]);
        } else {
            $this->view('access-denied');
        }
    }

    public function show($id = null)
    {
        
        $this->view('condominios/show');
    }

    public function edit($id = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $condominio = new Condominio;
        $row = $condominio->where('id', $id);


        $errors =  array();
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Condominios', 'condominios'];
        $crumbs[] = ['Modificar', 'condominios/edit'];

        if (Auth::access('super_admin')) {
            $this->view('condominios\edit', [
                'row' => $row,
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
            $condominio = new Condominio();
            if ($condominio->validate($_POST)) {
                $_POST['date'] = date("Y-m-d H:i:s");

                $condominio->insert($_POST);
                $this->redirect('condominios');
            } else {
                $errors = $condominio->errors;
            }
        }
        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Condominios', 'condominios'];
        $crumbs[] = ['Nuevo', 'condominios/create'];

        $this->view('condominios\create', [
            'crumbs' => $crumbs,
            'errors' => $errors
        ]);
    }

    public function update($id=null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login');
        }

        $errors = array();
        if (count($_POST) > 0 && Auth::access('super_admin')) {
            $condominio = new Condominio();
            if ($condominio->validate($_POST)) {
                $_POST['date'] = date("Y-m-d H:i:s");

                $condominio->update($id, $_POST);
                $this->redirect('condominios');
            } else {
                $errors = $condominio->errors;
            }
        }

        $row = $condominio->where('id', $id);

        $crumbs[] = ['Dashboard', ''];
        $crumbs[] = ['Condominios', 'condominios'];
        $crumbs[] = ['Nuevo', 'condominios/edit'];
        
        $this->view('condominios/edit', [
            'row' => $row,
            'crumbs' => $crumbs,
            'errors' => $errors
        ]);
    }

    public function destroy($id=null)
    {   
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
       
		$condominio = new Condominio();

		$errors = array();

		if(count($_POST) > 0 && Auth::access('super_admin'))
 		{
            $condominio->delete($id);
 			$this->redirect('condominios');
  		}

 		$row = $condominio->where('id',$id);
 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Condominios','condominios'];
		$crumbs[] = ['Delete','condominios/destroy'];

		if(Auth::access('super_admin')){
			$this->view('condominios/delete',[
				'row'=>$row,
	 			'crumbs'=>$crumbs,
			]);
		}else{
			$this->view('access-denied');
		}
	}
}
