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

		$this->view('home\index');
	}


}