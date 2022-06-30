<?php
/**
 * User Persona
 */
class Persona  extends Model
{
	protected $allowedColumns = [
        
        'doc_tipo',
        'doc_numero',
        'nombre',
        'apellido_1',
        'apellido_2',
        'genero',
        'fecha_nacimineto',
    ];

    protected $beforeInsert = [
        
    ];

    protected $beforeUpdate = [
        
    ];

    public function validate($DATA,$id='')
    {
        $this->errors = array();

        //verifica documento
        $tipo_documento = ['dni','ce', 'otro'];
        if(empty($DATA['doc_tipo']) || !in_array($DATA['doc_tipo'], $tipo_documento))
        {
            $this->errors['doc_tipo'] = "El tipo de documento no es válido";
        }

        //verifica nombre
        if(empty($DATA['nombre']) || !preg_match('/^[a-zA-Z0-9 _]+$/', $DATA['nombre']))
        {
            $this->errors['nombre'] = "El nombre debe ser solo letras";
        }

        //verifica apellido_1
        if(empty($DATA['apellido_1']) || !preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['apellido_1']))
        {
            $this->errors['apellido_1'] = "El apellido permite solo letras";
        }

        //verifica apellido_2
        if(empty($DATA['apellido_2']) || !preg_match('/^[a-zA-Z0-9 ]+$/', $DATA['apellido_2']))
        {
            $this->errors['apellido_2'] = "El apellido permite solo letras";
        }

        $generos = ['masculino','femenino'];
        if(empty($DATA['genero']) || !in_array($DATA['genero'], $generos))
        {
            $this->errors['genero'] = "El genero no es válido";
        }
        
        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;
    }
}