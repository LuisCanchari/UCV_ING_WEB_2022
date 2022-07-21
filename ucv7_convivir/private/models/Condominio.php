<?php
class Condominio extends Model{

    protected $table = 'condominios';
    protected $allowedColumns = [
        'name',
        'city',
        'address',
        'date',
    ];

    protected $beforeInsert = [
       
    ];

    protected $afterSelect = [
      
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
    
}
?>