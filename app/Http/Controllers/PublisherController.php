<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\Role;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();

        return view('publisher.index', ['publishers' => $publishers]);
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
    public function store(Request $request)
    {
        $validations = [
            'name'     => 'required|min:3|max:50',
            'phone'    => 'required|max:15',
            'email'    => 'email',
            'document' => 'required|max:20',
            'password' => 'required|max:50',
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
            'password.max' => 'Password must contain up to 50 characters',

        ];
        
        $request->validate($validations, $feedbacks);

        $publisher = Publisher::create($request->all());

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
            'password' => 'required|max:50',
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
            'password.max' => 'Password must contain up to 50 characters',

        ];

        $request->validate($validations, $feedbacks);

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
