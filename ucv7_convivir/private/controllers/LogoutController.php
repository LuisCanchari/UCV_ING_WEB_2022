<?php
class LogoutController extends Controller{
    public function index(){
        {
            Auth::logout();
             $this->redirect('login');
        }
    }
}