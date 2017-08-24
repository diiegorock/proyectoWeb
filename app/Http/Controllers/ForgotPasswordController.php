<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Reminder;
use Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(){
    	return view('auth.passwords.email');
    }

    public function postForgotPassword(Request $request){

    	$user = User::whereEmail($request->email)->first();

    	if(count($user) == 0)
    		return redirect()->back()->with([
    			'success' => 'El código de reenvio fue enviado a la dirección especificada.'
    		]);
    
    	$reminder = Reminder::exists($user) ?: Reminder::create($user);
    	$this->sendEmail($user, $reminder->code);
    }

    private function sendEmail($user, $code){

    	Mail::send('emails.forgot-password', [
    		'user' => $user,
    		'code' => $code
    	], function($message) use ($user){
    		$message->to($user->email);
    		$message->subject("Hola $user->first_name, reestablece tu contraseña");
    	});
    }
}
