<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    /**
     * Tabla de la base de datos que usa el modelo.
     *
     * @var string
     */
    protected $table = 'unidad';

    /**
     * Atributos para asignacion 
     *
     * @var array
     */
    protected $fillable = ['tipo','numero','descripcion', 'edificio_id'];

    /**
     * Eloquent relacion 
     *
     * @var array
     */
    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }

    /**
     * Eloquent relacion 
     *
     * @var array
     */
    public function propietario()
    {
        return $this->belongsTo('App\User')->where('role', 2);
    }

    public function getTipo(){

        switch ($this->tipo) {
            case 1:
                return 'Departamento';
                break;
            case 2:
                return 'Bodega';
                break;
            case 3:
                return 'Estacionamiento';
                break;
        }
    }
}
