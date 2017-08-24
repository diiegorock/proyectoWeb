<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GastoComun;
use App\Condominio;

class GastoComunController extends Controller
{
    public function index(){

    	$comunidades = Condominio::all();

    	/*foreach ($comunidades as $comunidad) {
    		foreach ($comunidad->gastosComunes as $gastoComun) {
    			foreach ($gastoComun->detalle as $detalle) {
    					
    			}
    		}
    	}
    	
    	$comunidades = Condominio::with('gastosComunes', 'detalle')
               ->whereHas('gastosComunes', function($q)
                {$q->where('id','=', 'condominio_id');})
                
               ->get();

    	dd($comunidades);*/
    	return view('gastocomun', compact('comunidades'))->with(['method' => 'index']);
    }

    public function store(Request $Request){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
