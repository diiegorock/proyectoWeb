<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;	
use App\User; 
use Validator;

class UsuariosController extends Controller
{

     public function index(){
        
        $usuarios = User::all();
        return view('usuarios')->with(['usuarios' => $usuarios, 'method' => 'index']);
    }

    public function store(Request $request){

    	$this->validate($request, [
    		'name' => 'required',
    		'role' => 'required|numeric',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required',
    		'confirm-password' => 'required|same:password',
    		],
            [
            'name.required' => 'El nombre es requerido',
            'role.required'  => 'El rol es requerido',
            'email.required'  => 'El email es requerido',
            'email.email'  => 'El email debe tener el formato: aa@bb.cc',
            'email.uniqe' => 'Esta dirección ya se encuentra en la base de datos',
            'password.required'  => 'La contraseña es requerida',
            'confirm-password.required'  => 'Debes confirmar la contraseña',
            'confirm-password.same'  => 'La confirmación no coindice con la contraseña ingresada',
            ]);

    	$usuario = new User();
    	$usuario->name = $request->name;
        $usuario->role = $request->role;
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->avatar = 'default.jpg';
        
        $request->verify ? $usuario->verified = 0 : $usuario->verified = 1; 

        $usuario->save();
        return response()->json($usuario);
    }

    public function edit($id){
        
        $usuario = User::find($id);
        return response()->json($usuario);
        //return view('usuarios', compact('usuario'))->with(['method' => 'edit']);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'role' => 'required|numeric',
            'email' => 'required|email|unique:users,email,'.$id,
            'confirm-password' => 'same:password',
            ],
            [
            'name.required' => 'El nombre es requerido',
            'role.required'  => 'El rol es requerido',
            'email.required'  => 'El email es requerido',
            'email.email'  => 'El email debe tener el formato: aa@bb.cc',
            'email.unique' => 'Esta dirección de correo ya existe en la base de datos',
            'confirm-password.same'  => 'La confirmación no coindice con la contraseña ingresada',
            ]);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->role = $request->role;
        $usuario->email = $request->email; 
        if($request->password && $request->password != '') $usuario->password = bcrypt($request->password);

        if($usuario->save()) return response()->json($usuario);
    }

    public function destroy($id){

        $usuario = User::find($id);
        $usuario->delete(); 
        return response()->json($usuario);
        
    }
}
