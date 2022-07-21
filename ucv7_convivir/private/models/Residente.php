<?php

class Residente extends Model
{
    protected $allowedColumns = [
        'inmueble_id',
        'persona_id'
    ];

    protected $beforeInsert = [
        
    ];

    protected $beforeUpdate = [
        
    ];

    protected $afterSelect = [
        'get_persona',
    ];


    public function get_persona($data)
    {
        $persona = new Persona();

        foreach ($data as $key => $row) {
            
            $result = $persona->where('id',$row->persona_id);
            $data[$key]->persona = is_array($result) ? $result[0] : false;
        }
        return $data;
    }
}
