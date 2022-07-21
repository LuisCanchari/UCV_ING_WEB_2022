<?php

class LoginController extends Controller{

    function index()
	{
		$errors = array();

		if(count($_POST) > 0)
 		{
            $user = new Usuario();
 			if($row = $user->where('email',$_POST['email']))
 			{
 				$row = $row[0];
 				if(password_verify($_POST['password'], $row->password))
 				{
					$condominio = new Condominio();
					$detalle = $condominio->findById($row->condominio_id);
					$row->condominio_name = $detalle->name;
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