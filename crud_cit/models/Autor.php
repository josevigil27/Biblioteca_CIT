<?php

namespace Model;

class Autor extends ActiveRecord
{
    protected static $tabla = 'autores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'fecha_nac', 'ciudad', 'pais', 'redes'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->fecha_nac = $args['fecha_nac'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->fecha_nac) {
            self::$alertas['error'][] = 'La Fecha de Nacimiento es Obligatorio';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'El Campo Ciudad es Obligatorio';
        }
        if(!$this->pais) {
            self::$alertas['error'][] = 'El Campo País es Obligatorio';
        }

        return self::$alertas;
    }
}