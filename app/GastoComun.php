<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetalleGastoComun;

class GastoComun extends Model
{
    
    protected $table = 'cgastocomun';

    public function detalle(){
    	return $this->hasMany('App\DetalleGastoComun', 'cgastocomun_id');
    }

    public function total(){

    	$detalle = $this->detalle;

    	$total = 0;

    	foreach ($detalle as $monto) {
    		$total = $total + $monto->valor;
    	}

    	return $total;
    }    
}
