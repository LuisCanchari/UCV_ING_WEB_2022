<?php
class Inmueble extends Model{

    protected $table = 'inmuebles';
    protected $allowedColumns = [
        'tipo',
        'numeracion',
        'area',
    ];
    protected $beforeInsert = [
        "make_condominio_id"
       
    ];

    protected $afterSelect = [
        "get_propietario",
        "get_residentes"
    ];

    public function validate($DATA)
    {
        $this->errors = array();

         $tipos = ['departamento','vivienda', 'cochera', 'deposito', 'terreno'];
        
         if(empty($DATA['tipo']) || !in_array($DATA['tipo'], $tipos))
         {
             $this->errors['tipo'] = "Tipo no valido";
         }

        if(empty($DATA['numeracion']) || !preg_match('/^[a-zA-Z0-9-]+$/', $DATA['numeracion']))
        {
            $this->errors['numeracion'] = "La numeracion no es valida";
        }

        if(empty($DATA['area']) || $DATA['area']<0)
        {
            $this->errors['area'] = "El area no es valida";
        }

        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }

    public function make_condominio_id($data)
    {
        if(isset($_SESSION['USER']->condominio_id)){
            $data['condominio_id'] = $_SESSION['USER']->condominio_id;
        }
        return $data;
    }

    public function get_propietario($data)
    {
        $persona  = new Persona();
        foreach ($data as $key => $row) {
                        
            $query = "select * from personas pe inner join propietarios pr on pe.id = pr.persona_id
            where pr.inmueble_id = :inmueble_id";
            $result=$persona->query($query,['inmueble_id' => $row->id]);
            $data[$key]->propietario = is_array($result) ? $result[0] : false;
        }
        return $data;
    }

    public function get_residentes($data)
    {
        $persona  = new Persona();
        foreach ($data as $key => $row) {
            $query = "select * from personas pe inner join residentes pr on pe.id = pr.persona_id
            where pr.inmueble_id = :inmueble_id";
            $result=$persona->query($query,['inmueble_id' => $row->id]);
            $data[$key]->residentes = is_array($result) ? $result : false;
        }
        return $data;
    }

    public function set_propietario($data){
        
        $query = "select * from propietarios where inmueble_id = :inmueble_id";
        $resultado = $this->query($query,array('inmueble_id'=>$data['inmueble_id']));

        if(!($resultado)){
            $this->add_propietario($data);
        }else{
            $this->upd_propietario($data);
        }
    }

    public function upd_propietario($data){
        $query = "update propietarios set persona_id = :persona_id where inmueble_id=:inmueble_id";
        return $this->query($query,$data);
    }

    public function add_propietario($data){
        $keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);

        $query = "insert into propietarios ($columns) values (:$values)";
        
        return $this->query($query,$data);
    }

    public function add_residente($data){
        $keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);

        $query = "insert into residentes ($columns) values (:$values)";
        return $this->query($query,$data);
    }

}
?>