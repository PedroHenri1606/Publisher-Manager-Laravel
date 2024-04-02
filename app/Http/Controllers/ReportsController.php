<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    public function reports(){
        if(Auth::check()){
            $publisher = Auth::user();

            if(Publisher::where('email', $publisher->email)->exists() == true){
                $publisher = Publisher::where('email', $publisher->email)->first();
                $domains = Domain::where('publisher_id', $publisher->id)->get();

                return view('reports.index', ['domains' => $domains]);
            }            
                $domains = Domain::all();
                return view('reports.index', ['domains' => $domains]);
        }
    }
}
