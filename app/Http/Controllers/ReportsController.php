<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\RevenueDomain;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function index(){
        return view("reports.index");
    }

    public function historic(Domain $domain){
        
        $revenuesDomain = RevenueDomain::where('domain_id', $domain->id)->get();
        return view("reports.historic", ['revenuesDomain' => $revenuesDomain, 'domain' => $domain]);
    }

    public function create(Domain $domain){

        return view('reports.create', ['domain' => $domain]);
    }

    public function store(Request $request){

        $validations = [
            'impressions' => 'required',
            'revenue' => 'required',
        ];

        $feedbacks = [
            'impressions.required' => "Impressions it's a required field",
            'revenue.required' => "Revenue it's a required field",
        ];

        $request->validate($validations, $feedbacks);

        $domain = Domain::where('domain', $request->domain)->first();

        $revenueDomain = new RevenueDomain;
        $revenueDomain->domain_id = $domain->id;
        $revenueDomain->impressions = $request->impressions;
        $revenueDomain->cpm = (($request->revenue / $request->impressions) * 1000);
        $revenueDomain->rpm = (($request->revenue / $request->impressions) * 1000);
        $revenueDomain->revenue = $request->revenue;

        $revenueDomain->save();
       
        return redirect()->route('reports.index');
        
    }

    public function show(Domain $domain){

        $revenueDomain = RevenueDomain::where('domain_id', $domain->id)->first();
            
            $domainDatas = RevenueDomain::where('domain_id', $domain->id)->get();

        return view('reports.show', compact('domain','revenueDomain'));
    }

}
