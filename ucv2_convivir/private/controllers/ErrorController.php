<?php
class ErrorController extends Controller{
    public function index()
	{
		// code...
		$this->view('home\404');
	}

}