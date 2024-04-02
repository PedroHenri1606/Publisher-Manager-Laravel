<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function create(){
        return view("login.create");
    }
   
    public function index(Request $request){

        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'User not found';
        }
        else if($request->get('erro') == 2){
            $erro = 'Please log in to access the system';
        }

        return view('login.index', ['erro' => $erro]);
    }

    public function authentication(Request $request){
        
        $credentials = $request->validate([
            'email' => ['email'],
            'password' => ['required']
        ]);
      
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->route('domain.index');
        } else {
            return redirect()->route('login', ['erro' => 1]);
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }
}
