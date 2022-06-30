<?php
class Gasto extends Model{
    protected $table = 'documentos';
    protected $allowedColumns = [
        'type',
        'number',
        'total',
        'description',
        'date',
        'year',
        'month'
    ];

    protected $beforeInsert = [
        'make_user_id',
        'make_condominio_id',
    ];

    protected $afterSelect = [
        'get_user',
    ];

    public function validate($DATA)
    {
        $this->errors = array();

        $document_types = ['boleta','factura', 'recibo', 'otro'];
        if(empty($DATA['type']) || !in_array($DATA['type'], $document_types))
        {
            $this->errors['type'] = "El tipo de documento no es válido";
        }

        
        if(empty($DATA['number']) || !preg_match('/^[0-9 \_\-]+$/', $DATA['number']))
        {
            $this->errors['number'] = "Solo se acepta numeros";
        }

        
        if(empty($DATA['total']) || $DATA['total']<0)
        {
            $this->errors['total'] = "El total es una cantidad positiva";
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
            $data['usuario_id'] = $_SESSION['USER']->id;
        }
        return $data;
    }

    public function make_condominio_id($data)
    {
        if(isset($_SESSION['USER']->condominio_id)){
            $data['condominio_id'] = $_SESSION['USER']->condominio_id;
        }
        return $data;
    }

    public function get_user($data)
    {
        $user = new Usuario();

        foreach ($data as $key => $row) {
            
            $result = $user->where('id',$row->usuario_id);
            $data[$key]->user = is_array($result) ? $result[0] : false;
        }
        return $data;
    }
}