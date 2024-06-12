<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facades\Auth;

class Authcontroler extends Controller
{
    public function login_user(Request $request){
        if ($request->method() === 'GET'){
        return view('auth.login');
        }else{
          $credentials = $request->validate([
                'email' => 'required|string|max:255|unique:users',
                'passoword' => 'required|string|min:8|confirmed'
            ]);
            if (Auth::attemp($credentials)) {
                return redirect() 
                ->route("/user")
                ->with("succes" , "login feito com sucesso");
            }
            return back()->witherros(["email"=> "credenciais erradas.",
            ])->wuthInput(); 
            

        }
    }
    public function logout_user(Request $request) {
        Auth::logout();
        
        return redirect()
        ->route('listALLUsers')
        ->with('succes' , 'logout realizado com sucesso');

    }
}

    
