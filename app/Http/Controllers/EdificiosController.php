<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edificio;
use Illuminate\Support\Facades\Log;

class EdificiosController extends Controller
{

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'descripcion' => 'required',
            ],
            [
            'name.required' => 'El nombre es requerido',
            'descripcion.required'  => 'La descripcion es requerida',
            ]);

        $edificio = new Edificio();
        $edificio->nombre = $request->name;
        $edificio->descripcion = $request->descripcion;
        $edificio->condominio_id = $request->id_comunidad;
         
        $edificio->save();
        return response()->json($edificio);
    }

    public function destroy($id){

        $edificio = Edificio::find($id);
        $edificio->delete(); 
        return response()->json($edificio);   
    }

    public function edit($id){

        $edificio = Edificio::find($id);
        return response()->json($edificio);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required'
            ],
            [
            'nombre.required' => 'El nombre del edificio es requerida',
            'descripcion.required' => 'La descripcion del edificio es requerido'
            ]);

        $edificio = Edificio::find($id);
        $edificio->nombre = $request->nombre;
        $edificio->descripcion = $request->descripcion;

        if($edificio->save()) return response()->json($edificio);
    }

    public function show($id){
        $edificio = Edificio::find($id);
        return view('edificios', compact('edificio'))->with(['method' => 'show']);
    }
}
