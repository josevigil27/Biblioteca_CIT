<?php

namespace Model;

class Genero extends ActiveRecord
{
    protected static $tabla = 'generos';
    protected static $columnasDB = ['id', 'nombre'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }

        return self::$alertas;
    }
}