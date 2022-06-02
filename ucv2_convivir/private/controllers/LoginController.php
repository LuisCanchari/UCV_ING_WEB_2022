<?php

class LoginController extends Controller{

    function index()
	{
		// code...
        
		$errors = array();

		if(count($_POST) > 0)
 		{
            $user = new User();
 			if($row = $user->where('email',$_POST['email']))
 			{
 				$row = $row[0];
 				if(password_verify($_POST['password'], $row->password))
 				{
					
					$condominio = new Condominio();
 					$condominio_row = $condominio->first('id',$row->condominio_id);
 					$row->condominio_name = $condominio_row->name;
										
					Auth::authenticate($row);
 					$this->redirect('/home');	
 				}else{
					$errors['pass'] = "Password incorrecto";
				}
 			} else {
				$errors['email'] = "Email incorrecto";
			}
 		}

		$this->view('login',[
			'errors'=>$errors,
		]);
	}
	
	//para ver el password generado
	public function passhash($password){
		$passhash =  password_hash($password, PASSWORD_DEFAULT);
		echo $passhash;
	}

}