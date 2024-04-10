<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);
        return view('user.index', ['users' => $users]);
    }


    public function create()
    {
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }


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

            //Define a role do usuario pelo 
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


    public function show(User $user)
    {
        return view("user.show", ['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }


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


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index', ['user' => $user->id]);
    }
}
