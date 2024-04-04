<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    public $users;

    public function index(){
        /*
        if(Auth::check()){
            $publisher = Auth::user();

            if(Publisher::where('email', $publisher->email)->exists() == true){
                $publisher = Publisher::where('email', $publisher->email)->first();
                $domains = Domain::where('publisher_id', $publisher->id)->get();

                return view('reports.index', ['domains' => $domains]);
            }            
                $domains = Domain::all();
                return view('reports.index', ['domains' => $domains]);
        }*/

        $this->users = User::all();
        return view("reports.index",['users'=> $this->users]);
    }

    public function buscar(Request $request)
    {   
        $valorInput = $request->input('valor');

        $this->users = User::where('id', $valorInput)->orWhere('name','like', "$valorInput%")->orWhere('email', 'like', "$valorInput%")->get(); 

        return response($this->users);
    }
}
