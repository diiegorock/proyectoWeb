<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
	/**
     * Tabla de la base de datos que usa el modelo.
     *
     * @var string
     */
    protected $table = 'edificio';

    /**
     * Atributos para asignacion 
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','condominio_id'];

    /**
     * Eloquent relacion 
     *
     * @var array
     */
    public function condominio()
    {
        return $this->belongsTo('App\Condominio');
    }

    /**
     * Eloquent relacion 
     *
     * @var array
     */
    public function unidades()
    {
        return $this->hasMany('App\Unidad');
    }

    public function departamentos(){

        return $this->hasMany('App\Unidad')->where('tipo', 1);

    }

    public function bodegas(){

        return $this->hasMany('App\Unidad')->where('tipo', 2);

    }

    public function estacionamientos(){

        return $this->hasMany('App\Unidad')->where('tipo', 3);

    }
}
