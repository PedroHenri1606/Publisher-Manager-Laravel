<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::paginate(10);

        return view('publisher.index', ['publishers' => $publishers]);
    }

    public function find(Request $request)
    {
        //Verifica possui autenticação
        if(Auth::check()){
            //id do publisher que desejamos acessar 
            $id = $request->input('id');
                $publisher = Publisher::where('id', $id)->first();

                //Se informar um valor invalido, retorna ao index 
                if($publisher == null){
                    $publisher = Publisher::paginate(10);
                    return view('publisher.index', ['publishers' => $publisher]);
                }
         
        }
        return view ('publisher.edit', ['publisher' => $publisher]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $roles = Role::all();
        return view('publisher.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
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
        
        $user = new User;
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->password = bcrypt($request->password);
        $user->status = true;
        $user->save();
        
        $role = defender()->findRole('publisher');
        $user->attachRole($role);
        
        $usuarioPublisher = User::where('email', $user->email)->first();

        $publisher->name = $request->name;
        $publisher->phone = $request->phone;
        $publisher->email = $request->email;
        $publisher->document = $request->document;
        $publisher['password'] = bcrypt($request->password);
        $publisher['user_id'] = $usuarioPublisher->id; 
        $publisher->save();

        return redirect()->route('publisher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        $domains = Domain::where('publisher_id', $publisher->id)->get();

        return view('publisher.show', ['publisher' => $publisher, 'domains' => $domains]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        $roles = Role::all(); 
        return view('publisher.edit', ['publisher' => $publisher, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {

        $publisher->delete();

        return redirect()->route('publisher.index', ['publisher' => $publisher->id]);
    }
}
