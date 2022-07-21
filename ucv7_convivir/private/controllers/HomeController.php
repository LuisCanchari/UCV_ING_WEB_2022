<?php
class HomeController extends Controller
{
	public function index()
	{
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}
		
		$this->view('home\index');
	}
}