<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;

class UnidadesController extends Controller
{
    	
    function addUnidad(Request $request){
    	
    }

    function editUnidad($id){

    	$unidad = Unidad::find($id);
    	return view('unidades');
    }

    public function store(Request $request){

    	$this->validate($request, [
            'tipo' => 'required',
            'number' => 'required|numeric',
            'descripcion' => 'required',
            ],
            [
            'tipo.required' => 'El tipo de unidad es requerido',
            'number.required'  => 'El número de la unidad es requerido',
            'number.numeric' => 'Debe ser un número',
            'descripcion.required' => 'La descripción es requerida'
            ]);

    	$unidad = new Unidad();
    	$unidad->tipo = $request->tipo;
    	$unidad->numero = $request->number;
    	$unidad->descripcion = $request->descripcion;
    	$unidad->edificio_id = $request->id_edificio;

    	$unidad->save();
    	return response()->json($unidad);
    }

    public function edit($id){

        $unidad = Unidad::find($id);
        return response()->json($unidad);
    }

    public function update(Request $request, $id){

    	$this->validate($request, [
    		'tipo' => 'required',
    		'numero' => 'required|numeric',
    		'descripcion' => 'required',
    		],
    		[
    		'tipo.required' => 'El tipo es requerido',
    		'numero.required' => 'El número de la unidad es requerido',
    		'numero.numeric' => 'Debe ser un dígito numérico',
    		'descripcion.required' => 'La descripción es requerida'
    		]);

    	$unidad = Unidad::find($id);
    	$unidad->tipo = $request->tipo;
    	$unidad->numero = $request->numero;
    	$unidad->descripcion = $request->descripcion;

    	if($unidad->save()) return response()->json($unidad);
    }

    public function destroy($id){

        $unidad = Unidad::find($id);
        $unidad->delete(); 
        return response()->json($unidad);   
    }
}
