<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    public function index(){
    
        $user = auth()->user();

        if(Publisher::where('email', $user->email)->exists()){
           
            $publisher = Publisher::where('email', $user->email)->first();
    
            $domains = Domain::where('publisher_id', $publisher->id)->count();
            $activeDomains = Domain::where('status' , 1)->where('publisher_id', $publisher->id)->count();
        
        } else {

            $domains = Domain::all()->count();
            $activeDomains = Domain::where('status', 1)->count();
            
        }
        
        $publishers = Publisher::all()->count();

        $revshares = Domain::all()->pluck('revshare')->toArray();
        $revshares = implode(',', $revshares); 

        $domainNames = Domain::all()->pluck('id')->toArray();     
        $domainNames = implode(',', $domainNames);

        return view("reports.index", compact('domains','publishers','activeDomains','revshares','domainNames'));
    }
}
