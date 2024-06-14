<?php

namespace Model;

class Libro extends ActiveRecord
{
    protected static $tabla = 'libros';
    protected static $columnasDB = ['id', 'generoid', 'autorid', 'nombre', 'sinopsis'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->generoid = $args['generoid'] ?? '';
        $this->autorid = $args['autorid'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->sinopsis = $args['sinopsis'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->generoid) {
            self::$alertas['error'][] = 'Elija un Genero';
        }
        if(!$this->autorid) {
            self::$alertas['error'][] = 'Elija un Autor';
        }
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->sinopsis) {
            self::$alertas['error'][] = 'La Sinopsis es Obligatorio';
        }
        if(!$this->sinopsis < 30) {
            self::$alertas['error'][] = 'La Sinopsis no se puede guardar hasta que unos 30 minutos';
        }

        return self::$alertas;
    }
}