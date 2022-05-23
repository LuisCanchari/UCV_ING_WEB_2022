<?php
class LogoutController extends Controller{
    public function index(){
        {
            // code...
            Auth::logout();
             $this->redirect('login');
     
        }

    }
    
}