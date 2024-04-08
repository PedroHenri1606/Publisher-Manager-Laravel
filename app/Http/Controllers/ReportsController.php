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
           
            //se o usuario for publisher
            $publisher = Publisher::where('email', $user->email)->first();
    
            $domains = Domain::where('publisher_id', $publisher->id)->count();
            $activeDomains = Domain::where('status' , 1)->where('publisher_id', $publisher->id)->count();

            $revshares = Domain::all()->where('publisher_id', $publisher->id)->where('status', 1)->pluck('revshare')->toArray();
            $revshares = implode(',', $revshares); 
    
            $domainNames = Domain::all()->where('publisher_id', $publisher->id)->where('status', 1)->pluck('id')->toArray();     
            $domainNames = implode(',', $domainNames);
        
        } else {
            //se o usuario for admin
            $domains = Domain::all()->count();
            $activeDomains = Domain::where('status', 1)->count();

            $revshares = Domain::all()->where('status',1)->pluck('revshare')->toArray();
            $revshares = implode(',', $revshares); 
    
            $domainNames = Domain::all()->where('status', 1)->pluck('id')->toArray();     
            $domainNames = implode(',', $domainNames);
            
        }
        
        $publishers = Publisher::all()->count();

        return view("reports.index", compact('domains','publishers','activeDomains','revshares','domainNames'));
    }
}
