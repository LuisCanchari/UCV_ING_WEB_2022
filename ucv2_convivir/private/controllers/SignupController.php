<?php
/**
 * SignupController
 */

 class SignupController extends Controller{
     public function index(){
         $errors =  array();
         if(count($_POST)>0){
             $user =  new User();
             if($user->validate($_POST)){
                 $_POST['date']= date("Y-m-d H:i:s");
                $user->insert($_POST);

                 $this->redirect('users');
             }else{
                 //errors
                 $errors = $user->errors;
             }
             }
        
         $this->view('signup',[
             'errors'=>$errors,
         ]);
     }
 }