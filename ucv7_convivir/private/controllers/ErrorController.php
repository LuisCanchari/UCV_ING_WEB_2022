<?php
class ErrorController extends Controller{
    public function index()
	{
		$this->view('home\404');
	}

}