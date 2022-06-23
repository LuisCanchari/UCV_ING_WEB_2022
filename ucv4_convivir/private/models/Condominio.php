<?php
class Condominio extends Model{

    protected $table = 'condominios';
    protected $allowedColumns = [
        'name',
        'city',
        'date',
    ];

    protected $beforeInsert = [
        'make_user_id',
      //  'make_condominio_id'
    ];

    protected $afterSelect = [
        'get_user',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //verificamos el nombre
        if(empty($DATA['name']) || !preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['name']))
        {
            $this->errors['name'] = "Only letters & spaces allowed in name";
        }


        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

    public function make_user_id($data)
    {
        if(isset($_SESSION['USER']->id)){
            $data['user_id'] = $_SESSION['USER']->id;
        }
        return $data;
    }

    public function make_condominio_id($data)
    {
        
        $data['condominio_id'] = random_string(60);
        return $data;
    }

    public function get_user($data)
    {
        
        $user = new User();

        foreach ($data as $key => $row) {
            // code...
            
            $result = $user->where('id',$row->id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }
        return $data;
    }
}
?>