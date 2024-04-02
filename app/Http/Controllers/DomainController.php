<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            $publisher = Auth::user();

            if(Publisher::where('email', $publisher->email)->exists() == true){
                $publisher = Publisher::where('email', $publisher->email)->first();
                $domains = Domain::where('publisher_id', $publisher->id)->get();

                return view('domain.index', ['domains' => $domains]);
            }            
                $domains = Domain::all();
                return view('domain.index', ['domains' => $domains]);
        }
    }

    public function find(Request $request)
    {
        //Verifica possui autenticação
        if(Auth::check()){
            //id do domain que desejamos acessar 
            $id = $request->input('id');

            //Recebo os dados de autenticação do usuario
            $user = Auth::user();

            //Se o usuario logado for um publisher, ira apresentar somente os domains que ele cadastrou / Ele tera acesso somente aos dominios dele também
            if(Publisher::where('email', $user->email)->exists() == true){
                //Busco no banco pelo Eloquent os dados do Publisher pelo Usuario de autenticação
                $publishers = Publisher::where('email', $user->email)->first();
                //Domain recebe uma collection com o dominio que possue o mesmo id e que tem o mesmo publisher_id do usuario autenticado 
                $domain = Domain::where('id', $id)->where('publisher_id',$publishers->id)->get()->first();

                //Se informar um valor invalido, retorna ao index 
                if($domain == null){
                    $domains = Domain::where('publisher_id', $publishers->id)->get();
                    return view('domain.index', ['domains' => $domains]);
                }

            //Se o usuario for um admin, ira apresentar todos os dominios cadastrados na aplicação / Ele tera acesso a todos os dominios
            } else {
                $publishers = Publisher::all();
                $domain = Domain::where('id', $id)->get()->first();

            }
        } 
        return view ('domain.edit', ['domain' => $domain, 'publishers' => $publishers]);
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

        $domain = new Domain();
        $domain->domain = $request->domain;
        $domain->ravshare = $request->ravshare;~
        $domain->status = $request->status;

        if($domain->publisher_id == ''){
            if(Auth::check()){
                $publisher = Auth::user();

                $publisher = Publisher::where('email', $publisher->email)->first();
                $domain['publisher_id'] = $publisher->id;
                
            }

        } else {
            $domain->publisher_id = $request->publisher->id;
        } 

        $domain->save();
        
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
