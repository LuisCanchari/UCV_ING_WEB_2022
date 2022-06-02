<?php

/**
 * User Model
 */
class User extends Model
{

	protected $allowedColumns = [
        
        'firstname',
        'lastname',
        'email',
        'password',
        'condominio_id',
        'gender',
        'rol',
        'date'
      
    ];

    protected $beforeInsert = [
        'make_user_id',
        'make_condominio_id',
        'hash_password'
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //verifica firstname
        if(empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname']))
        {
            $this->errors['firstname'] = "firstname permite solo letras";
        }

        //verifica lastname
        if(empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname']))
        {
            $this->errors['lastname'] = "lastname permite solo letras";
        }

        //verifica email
        if(empty($DATA['email']) || !filter_var($DATA['email'],FILTER_VALIDATE_EMAIL))
        {
            $this->errors['email'] = "Email no es valido";
        }
        
        //verificz si existe email
        if($this->where('email',$DATA['email']))
        {
            $this->errors['email'] = "Email ya existe";
        }

        //verifica password y password2
        if(empty($DATA['password']) || $DATA['password'] !== $DATA['password2'])
        {
            $this->errors['password'] = "El password no coincide";
        }

        //verifica longitud de password
        if(strlen($DATA['password']) < 8)
        {
            $this->errors['password'] = "EL password requiere minimo 8 letras";
        }

        //verifica genero
        $genders = ['masculino','femenino'];
        
        if(empty($DATA['gender']) || !in_array($DATA['gender'], $genders))
        {
            $this->errors['gender'] = "Gender no es valido";
        }

        //verifica el rol
        $ranks = ['user','admin','super_admin'];
        
        if(empty($DATA['rol']) || !in_array($DATA['rol'], $ranks))
        {
            $this->errors['rol'] = "Rol no valido";
        }


        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

    public function make_user_id($data)
    {
        $data['user_id'] = random_string(60);
        return $data;
    }

    public function make_condominio_id($data)
    {
        if(isset($_SESSION['USER']->condominio_id)){
            $data['condominio_id'] = $_SESSION['USER']->condominio_id;
        }
        return $data;
    }

    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $data;
    }

   
}