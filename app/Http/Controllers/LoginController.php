<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\Publisher;
use Illuminate\Support\Str;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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


    public function showForm(Request $request){

        $erro = $request->erro;
         
        return view('login.show_form', ['erro' => $erro]);
    }


    public function sendEmail(Request $request){

        $request->validate(['email' => 'required|email']);

        if(User::where('email', $request->email)->exists() || Publisher::where('email', $request->email)->exists()){
            
            $user = User::where('email', $request->email)->first();

            $token = Str::random(64);
            $user->update(['reset_password_token' => $token]); 

                Mail::to($request->get('email'))->send(new ForgotPassword($token));

            return redirect()->route('login.showForm', ['erro' => 'Email successfully sent!']);
        
        } else {
            return redirect()->route("login.showForm", ['erro' => 'Email provided was not found!']);
        }

    }

    public function showFormReset($token){
    
        return view('login.form_reset', ['token' => $token]);
    }

    public function reset(Request $request, $token){

        if(User::where('reset_password_token', $token)->exists()){

            $user = User::where('reset_password_token', $request->token)->first();

            $user->update([
                'password' => bcrypt($request->password),
                'reset_password_token' => null,
            ]);


            return redirect()->route('login');

        } else {

          
            return redirect()->route('login'); 
        }
    }
}
