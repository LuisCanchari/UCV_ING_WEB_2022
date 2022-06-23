<?php

/**
 * Authentication class
 */
class Auth
{
	public static function authenticate($row)
	{
		// code...
		$_SESSION['USER'] = $row;
	}

	public static function logout()
	{
		// code...
		if(isset($_SESSION['USER']))
		{
			unset($_SESSION['USER']);
		}
	}

	public static function logged_in()
	{
		// code...
		if(isset($_SESSION['USER']))
		{
			
			return true;
		}

		return false;
	}

	public static function user()
	{
		if(isset($_SESSION['USER']))
		{
			return $_SESSION['USER']->firstname;
		}

		return false;
	}

	public static function __callStatic($method,$params)
	{
		
		$prop = strtolower(str_replace("get","",$method));

		if(isset($_SESSION['USER']->$prop))
		{
			
			return $_SESSION['USER']->$prop;
		}

		return 'Unknown';
	}

	public static function switch_condominio($id){
		if(isset($_SESSION['USER'])){
			if ($_SESSION['USER']->rol == 'super_admin'){
				
				$condominio = new Condominio();

				if ($row = $condominio->where('id', $id) ){
					print_r($_SESSION);

					$_SESSION['USER']->condominio_id = $row[0]->id;
					$_SESSION['USER']->condominio_name = $row[0]->name;
				}
				
			}
		}
	}

	public static function access($rol = 'user')
	{
		// code...
	
		if(!isset($_SESSION['USER']))
		{
			return false;
		}

		$logged_in_rol = $_SESSION['USER']->rol;

		$RANK['super_admin'] 	= ['super_admin','admin','user'];
		$RANK['admin'] 			= ['admin','user'];
		$RANK['user'] 			= ['user'];
		
		if(!isset($RANK[$logged_in_rol]))
		{
			return false;
		}

		if(in_array($rol,$RANK[$logged_in_rol]))
		{
			return true;
		}

		return false;
	}

	public static function i_own_content($row)
	{

		if(is_array($row))
		{
			$row = $row[0];
		}
		
		if(!isset($_SESSION['USER']))
		{
			return false;
		}

		if(isset($row->user_id)){

			if($_SESSION['USER']->user_id == $row->user_id){
				return true;
			}
		}

		$allowed[] = 'super_admin';
		$allowed[] = 'admin';

		if(in_array($_SESSION['USER']->rank,$allowed)){
			return true;
		}

		return false;
	}



    /*
	public static function switch_school($id)
	{
		if(isset($_SESSION['USER']) && $_SESSION['USER']->rank == 'super_admin')
		{
			$user = new User();
			$school = new School();

			if($row = $school->where('id',$id))
			{
				$row = $row[0];
 				$arr['school_id'] = $row->school_id;

				$user->update($_SESSION['USER']->id,$arr);
 				$_SESSION['USER']->school_id = $row->school_id;
				$_SESSION['USER']->school_name = $row->school;

			}
			
			return true;
		}

		return false;
	}
    */

	
}