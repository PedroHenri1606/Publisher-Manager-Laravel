<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('publisher.index', ['publishers' => $publishers]);
    }


    public function create(Request $request)
    {
        $roles = Role::all();
        return view('publisher.create',['roles' => $roles]);
    }


    public function store(Request $request, Publisher $publisher)
    {
        $validations = [
            'name'     => 'required|min:3|max:50',
            'phone'    => 'required|max:15',
            'email'    => 'email',
            'document' => 'required|max:20',
            'password' => 'required|max:100',
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'phone.required' => 'Phone is a required field',
            'phone.max' => 'Phone must contain up to 15 characters',

            'email.email' => 'Please enter a valid email address',

            'document.required' => 'Document is a required field',
            'document.max' => 'Document must contain up to 20 characters',

            'password.required' => 'Password is a required field',
            'password.max' => 'Password must contain up to 100 characters',

        ];
        
        $request->validate($validations, $feedbacks);
        
        //Criação do usuario
        $user = new User;
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->password = bcrypt($request->password);
        $user->status = true;
        $user->save();
        
        //Definição da role do usuario 
        $role = defender()->findRole('publisher');
        $user->attachRole($role);
        
        $usuarioPublisher = User::where('email', $user->email)->first();

        //Criação do usuario Publisher
        $publisher->name = $request->name;
        $publisher->phone = $request->phone;
        $publisher->email = $request->email;
        $publisher->document = $request->document;
        $publisher['password'] = bcrypt($request->password);
        $publisher['user_id'] = $usuarioPublisher->id; 
        $publisher->save();

        return redirect()->route('publisher.index');
    }


    public function show(Publisher $publisher)
    {
        $domains = Domain::where('publisher_id', $publisher->id)->get();
        return view('publisher.show', ['publisher' => $publisher, 'domains' => $domains]);
    }


    public function edit(Publisher $publisher)
    {
        $roles = Role::all(); 
        return view('publisher.edit', ['publisher' => $publisher, 'roles' => $roles]);
    }


    public function update(Request $request, Publisher $publisher)
    {
        $validations = [
            'name' => 'required|min:3|max:50',
            'phone' => 'required|max:15',
            'email' => 'email',
            'document' => 'required|max:20',
            'password' => 'required|max:100',
        ];

        $feedbacks = [
            'name.required' => 'Name is a required field',
            'name.min' => 'Name must contain at least 3 characters',
            'name.max' => 'Name must contain up to 40 characters',

            'phone.required' => 'Phone is a required field',
            'phone.max' => 'Phone must contain up to 15 characters',

            'email.email' => 'Please enter a valid email address',

            'document.required' => 'Document is a required field',
            'document.max' => 'Document must contain up to 20 characters',

            'password.required' => 'Password is a required field',
            'password.max' => 'Password must contain up to 100 characters',

        ];

        $request->validate($validations, $feedbacks);

        $publisher['password'] = bcrypt($request->password);
        $publisher->update($request->all());

        return redirect()->route('publisher.index');
    }


    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publisher.index', ['publisher' => $publisher->id]);
    }
}
