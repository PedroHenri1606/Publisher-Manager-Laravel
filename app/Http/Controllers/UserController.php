<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
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
    public function store(Request $request)
    {
        $validations = [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'required|min:5',
            'role_id' => 'required'
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'email.email' => 'Please enter a valid email address',

            'password.required' => 'Password is a required field',
            'password.min' => 'Password must contain at least 5 characters',

            'role_id.required' => 'Role is a required field',
        ];

        $request->validate($validations, $feedbacks);

        $user = User::create($request->all());

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
        $roles = Role::all();
        return view('user.edit', ['user' => $user, 'roles' => $roles]);
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
            'role_id' => 'required'
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'email.email' => 'Please enter a valid email address',

            'password.required' => 'Password is a required field',
            'password.min' => 'Password must contain at least 5 characters',

            'role_id.required' => 'Role is a required field',
        ];

        $request->validate( $validations, $feedbacks);

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
