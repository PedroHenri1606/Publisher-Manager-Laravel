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

        $revenueDomain = new RevenueDomain;

        $cpmAverage = 0;
        $rpmAverage = 0;

        $totalRevenue = 0;
        $totalImpressions = 0;

        $valoresCpmGrafico = '';  $indiceCpmGrafico = '';
        $valoresRevenueGrafico = '';  $indiceRevenueGrafico = '';
        
        //Se o domain possuir um historic log, ira enviar revenue com os dados do domain
        if(RevenueDomain::where('domain_id', $domain->id)->exists()){

            //Valores presentes no grafico CPM
            $valoresCpmGrafico = RevenueDomain::where('domain_id', $domain->id)->pluck('cpm')->toArray();

                $indiceCpmGrafico = range(1, count($valoresCpmGrafico));
                $indiceCpmGrafico = implode(',', $indiceCpmGrafico);

            $valoresCpmGrafico = implode(',', $valoresCpmGrafico);

            //Valores presentes no grafico Revenue
            $valoresRevenueGrafico = RevenueDomain::where('domain_id', $domain->id)->pluck('revenue')->toArray();

                $indiceRevenueGrafico = range(1, count($valoresRevenueGrafico));
                $indiceRevenueGrafico = implode(',', $indiceRevenueGrafico);

            $valoresRevenueGrafico = implode(',', $valoresRevenueGrafico);

            //Valores presentes nos cards de informações do site
            $revenuesDomain = RevenueDomain::where('domain_id', $domain->id)->get();

            foreach($revenuesDomain as $indice => $valor){
                $cpmAverage += $revenuesDomain[$indice]->cpm / $revenuesDomain->count();
                    $cpmAverage = number_format($cpmAverage,2);

                $rpmAverage += $revenuesDomain[$indice]->rpm / $revenuesDomain->count();
                    $rpmAverage = number_format($rpmAverage,2);

                if($revenuesDomain[$indice]->revenue > $totalRevenue){
                    $totalRevenue += $revenuesDomain[$indice]->revenue;
                }

                if($revenuesDomain[$indice]->impressions > $totalImpressions){
                    $totalImpressions += $revenuesDomain[$indice]->impressions;
                }
            }

            return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
        
        } else{

            //Se o domain não possui um historic log, ire enviar os dados zerados
            return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
        }
    }

    public function deleteRevenue(RevenueDomain $revenueDomain){

        $domain = Domain::where('id', $revenueDomain->domain_id)->first();
       
        $revenueDomain->delete();

        return redirect()->route('reports.historic', ['revenueDomain' => $revenueDomain, 'domain' => $domain]);
    }
}
