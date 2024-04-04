<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Artesaos\Defender\Defender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function buscar(Request $request)
    {
        $valorInput = $request->input('valor');

        $colecao = User::where('id', $valorInput)->orWhere('name','like', "$valorInput%")->orWhere('email', 'like', "$valorInput%")->get(); // Substitua 'campo' pelo campo correto

        return response()->json(['html' => $colecao]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', ['users' => $users]);
    }

    public function find(Request $request)
    {
        //Verifica possui autenticação
        if(Auth::check()){
            //id do publisher que desejamos acessar 
            $input = $request->input('input');

                $user = User::where('id', $input)->orWhere('email','like', "%$input%")->orWhere('name', $input)->first();

                //Se informar um valor invalido, retorna ao index 
                if($user == null){
                    $users = User::paginate(10);
                    return view('user.index', ['users' => $users]);
                }
         
        }
        return view ('user.edit', ['user' => $user]);

    }

    public function orderById()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('user.index', ['users' => $users]);
    }

    public function orderByName()
    {
        $users = User::orderBy('name','desc')->paginate(10);
        return view('user.index', ['users' => $users]);
    }

    public function orderByEmail()
    {
        $users = User::orderBy('email','desc')->paginate(10);
        return view('user.index', ['users' => $users]);
    }
    
    public function orderByStatus()
    {
        $users = User::orderBy('status','desc')->paginate(10);
        return view('user.index', ['users' => $users]);
    }  


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validations = [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|min:5',
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'email.email' => 'Please enter a valid email address',

            'password.required' => 'Password is a required field',
            'password.min' => 'Password must contain at least 5 characters',
        ];

        $request->validate($validations, $feedbacks);

        $user = $request->all();
        $user['password'] = bcrypt($request->password);
    
        $role = defender()->findRoleById($user['role_id']);
   
        $user = User::create($user);

        if($role->id == 1){
            $user->attachRole($role);
        }
        if($role->id == 2){
            $user->attachRole($role);
            
        }
        if($role->id == 3){
            $user->attachRole($role);
        }
    
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("user.show", ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validations = [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|min:5',
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'email.email' => 'Please enter a valid email address',

            'password.required' => 'Password is a required field',
            'password.min' => 'Password must contain at least 5 characters',
        ];

        $request->validate( $validations, $feedbacks);

        $request->password = bcrypt($request->password);
        $user->update($request->all());

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index', ['user' => $user->id]);
    }
}
