<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Publisher;
use App\Models\RevenueDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    public function index(){
        return view("reports.index");
    }

    public function historic(Domain $domain){

        $user = Auth::user();

        //se o usuario autenticado for publisher
        if(Publisher::where('email', $user->email)->exists()){
            $publisher = Publisher::where('email', $user->email)->first();

            //se o publisher_id do domain informado for diferente do id do publisher, encerra a função e envia novamente para a reports.index
            if($domain->publisher_id != $publisher->id){
                return redirect()->route('reports.index');
            
            } else {
                $revenuesDomain = RevenueDomain::where('domain_id', $domain->id)->get();
        
                return view("reports.historic", ['revenuesDomain' => $revenuesDomain, 'domain' => $domain]);
            }
        
        //se o usuario autenticado for um admin
        } else {
        
            $revenuesDomain = RevenueDomain::where('domain_id', $domain->id)->get();
            
            return view("reports.historic", ['revenuesDomain' => $revenuesDomain, 'domain' => $domain]);
        }
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
        
        $user = Auth::user();

        //se o usuario autenticado for publisher
        if(Publisher::where('email', $user->email)->exists()){
            $publisher = Publisher::where('email', $user->email)->first();

            //se o publisher_id do domain informado for diferente do id do publisher, encerra a função e envia novamente para a reports.index
            if($domain->publisher_id != $publisher->id){
                return redirect()->route('reports.index');
     
            } else {    

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

                    $totalImpressions = (number_format($totalImpressions,0,',','.'));
                    $totalRevenue = (number_format($totalRevenue,2,',','.'));

                    return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
                
                } else{

                    //Se o domain não possui um historic log, ire enviar os dados zerados
                    return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
                }
            }
        
        //se o usuario autenticado for um admin
        } else {

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

                $totalImpressions = (number_format($totalImpressions,0,',','.'));
                $totalRevenue = (number_format($totalRevenue,2,',','.'));

                return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
            
            } else{

                //Se o domain não possui um historic log, ire enviar os dados zerados
                return view('reports.show', compact('domain','totalImpressions','totalRevenue','cpmAverage','rpmAverage','valoresCpmGrafico','indiceCpmGrafico','valoresRevenueGrafico','indiceRevenueGrafico'));
            }
        } 
    }

    public function deleteRevenue(RevenueDomain $revenueDomain){

        $domain = Domain::where('id', $revenueDomain->domain_id)->first();
       
        $revenueDomain->delete();

        return redirect()->route('reports.historic', ['revenueDomain' => $revenueDomain, 'domain' => $domain]);
    }
}
