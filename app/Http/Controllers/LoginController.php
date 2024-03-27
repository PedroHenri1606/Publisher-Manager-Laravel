<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
        
        $validations = [
            'email' => 'email',
            'password' => 'required'
        ];
        
        $feedbaacks = [
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Please enter a valid password',
        ];

        $request->validate($validations, $feedbaacks);

        $email = $request->get('email');
        $password = $request->get('password');

        $userLog = new User();
        $userLog = User::where('email', $email)->where('password',$password)->get()->first();
        
        if(isset($userLog->name)){
            session_start();
            $_SESSION['name'] = $userLog->name;
            $_SESSION['email'] = $email;

    
            return redirect()->route('publisher.index', ['user_id' => $userLog->id]);
        } else {
            return redirect()->route('login', ['erro' => 1]);
        }
    }

    public function logout(){
        session_destroy();

        return redirect()->route('login'); 
    }
}
