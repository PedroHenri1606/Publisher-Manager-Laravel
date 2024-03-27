<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domains = Domain::all();

        return view('domain.index', ['domains' => $domains]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();

        return view('domain.create', ['publishers' => $publishers]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validations = [

        ];

        $feedbacks = [

        ];

        $request->validate($validations, $feedbacks);

        $domain = Domain::create($request->all());

        return redirect()->route('domain.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        return view('domain.show', ['domain'=> $domain]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        $publishers = Publisher::all();
        return view('domain.edit', ['publishers' => $publishers, 'domain' => $domain]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domain $domain)
    {
        $validations = [

        ];

        $feedbacks = [

        ];

        $request->validate($validations, $feedbacks);

        $domain->update($request->all());

        return redirect()->route('domain.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();

        return redirect()->route('domain.index', ['domain' => $domain->id]);
    }
}
