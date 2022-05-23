<?php
class HomeController extends Controller
{
    
	public function index()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		// code...

		$usuario =  new User();

		$data = $usuario->findAll();

	
		$this->view('home\index', ['data'=>$data]);

		
	}


}