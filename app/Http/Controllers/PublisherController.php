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
        $publishers = Publisher::all();
        $roles = Role::all();
        return view('publisher.create', ['publishers' => $publishers, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
