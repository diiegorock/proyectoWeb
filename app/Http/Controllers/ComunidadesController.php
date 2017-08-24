<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Condominio;
use Validator;

class ComunidadesController extends Controller
{

    public function index(){

        $comunidades = Condominio::all();
        return view('comunidades')->with(['comunidades' => $comunidades, 'method' => 'index']);
    }

    public function show($id){

        $comunidad = Condominio::find($id);
        return view('comunidades')->with(['comunidad' => $comunidad, 'method' => 'show']);
    }

    public function store(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'razon' => 'required',
            'direccion' => 'required',
            ],
            [
            'nombre.required' => 'El nombre es requerido',
            'razon.required'  => 'La razón social es requerida',
            'direccion.required'  => 'La dirección/descripción es requerida',
            ]);

    	$comunidad = new Condominio();
    	$comunidad->nombre = $request->nombre;
    	$comunidad->razonsocial = $request->razon;
    	$comunidad->descripcion = $request->direccion;
    	$comunidad->admin_id = $request->admin_id;

    	$comunidad->save();
    	return response()->json($comunidad);
    }

    public function destroy($id){

    	$comunidad = Condominio::find($id);
  
    	if(count($comunidad->edificios) == 0){
    		$comunidad->delete();
    		return response()->json($comunidad);
    	}else{
    		return response();
    	}
    }

    public function edit($id){
        
        $comunidad = Condominio::find($id);
        return response()->json($comunidad);
    }

    public function update(Request $request, $id){

    	$this->validate($request, [
    		'nombre' => 'required',
    		'razon' => 'required',
    		'direccion' => 'required'
    		],
    		[
    		'nombre.required' => 'El nombre de la comunidad es requerida',
    		'razon.required' => 'La razón social de la comunidad es requerida',
    		'direccion.required' => 'La descripción es requerida'
    		]);

    	$comunidad = Condominio::find($id);
    	$comunidad->nombre = $request->nombre;
    	$comunidad->razonsocial = $request->razon;
    	$comunidad->descripcion = $request->direccion;

    	if($comunidad->save()) return response()->json($comunidad);
    }

}