<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GastoComun;

class Condominio extends Model
{
	/**
     * Tabla de la base de datos que usa el modelo.
     *
     * @var string
     */
    protected $table = 'condominio';

    /**
     * Atributos para asignacion 
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];

    /**
     * Eloquent relacion 
     *
     * @var array
     */
    public function edificios(){
        return $this->hasMany('App\Edificio');
    }

    public function administrador(){
        return $this->belongsTo('App\User');
    }

    public function gastosComunes(){
        return $this->hasMany('App\GastoComun');
    }

    public function gastosComunesMes($mes){

        $gastoComun = $this->gastosComunes->where('mes', $mes);

        $total = 0; 

        foreach ($gastoComun as $cabecera) {
            foreach ($cabecera->detalle as $detalle) {
                $total = $total + $detalle->valor;
            }
        }

        return $total;
    }
}