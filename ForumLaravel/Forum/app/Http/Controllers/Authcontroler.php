<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroler extends Controller
{
    public function login_user(Request $request){
        if ($request->method() === 'GET'){
        return view('auth.login');
        }else{
          $credentials = $request->validate([
                'email' => 'required|string|max:255',
                'password' => 'required|string'
            ]);
            if (Auth::attempt($credentials)) {
                return redirect() 
                ->route('inicial')
                ->with("succes" , "login feito com sucesso");
            }
            return back()->witherros(["email"=> "credenciais erradas.",])->withInput(); 
            

        }
    }
    public function logout_user(Request $request) {
        Auth::logout();
        
        return redirect()
        ->route('inicial')
        ->with('succes' , 'logout realizado com sucesso');

    }
}

    
