<?php

namespace App\Http\Livewire;

use App\Models\Domain;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DomainIndex extends Component
{
    public $domains;
    public $input;

    public $tempSort = 0;

    //deve ser verificado se o usuario é um admin ou um publisher, se for publisher, mostrar somente os dominios que pertecem a ele
    public function mount()
    {
        $user = Auth::user();
        if(Publisher::where('email', $user->email)->exists() == true){

            $publisher = Publisher::where('email', $user->email)->first();
            $this->domains = Domain::where('publisher_id', $publisher->id)->get();
            
        } else {

        $this->domains = Domain::all();
        }
    }

    public function find()
    {
        //Verifica possui autenticação
        if(Auth::check()){
            
            //Recebo os dados de autenticação do usuario
            $user = Auth::user();

            //Se o usuario logado for um publisher, ira apresentar somente os domains que ele cadastrou / Ele tera acesso somente aos dominios dele também
            if(Publisher::where('email', $user->email)->exists() == true){
                //Busco no banco pelo Eloquent os dados do Publisher pelo Usuario de autenticação
                $publisher = Publisher::where('email', $user->email)->first();
                
                //Domain recebe uma collection com o dominio que possue o mesmo id e que tem o mesmo publisher_id do usuario autenticado 
                $this->domains = Domain::where('publisher_id',$publisher->id)
                                        ->where('id', $this->input)
                                        ->orWhere('domain', 'like', "%$this->input%")
                                        ->get();

        
            //Se o usuario for um admin, ira apresentar todos os dominios cadastrados na aplicação / Ele tera acesso a todos os dominios
            } else {
                
                $this->domains = Domain::where('id', $this->input)
                                        ->orWhere('domain', 'like',  "%$this->input%")
                                        ->get();
            }
        } 
    }

    public function orderBy($campo)
    {
        if($this->tempSort == 1){
            $userArray = $this->domains->sortByDesc($campo);
            $this->tempSort --;
        } 
        else if($this->tempSort == 0) {
            $userArray = $this->domains->sortBy($campo);
            $this->tempSort ++;
        }

        $this->domains = $userArray;    
    }    
    
    public function orderByStatus()
    {
        $primeiroRegistro = $this->domains->first();

        if($primeiroRegistro['status'] == 1){
            $userArray = $this->domains->sortByDesc('status');
        } 
        else {
            $userArray = $this->domains->sortBy('status');
        }

        $this->domains = $userArray;
    }  

    public function render()
    {
        return view('livewire.domain-index');
    }
}
