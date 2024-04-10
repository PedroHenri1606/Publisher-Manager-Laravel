<?php

namespace App\Http\Livewire\Report;

use App\Models\Domain;
use App\Models\Publisher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $domains;

    public $input;

    public $tempSort = 0;

    public function mount(){

        $user  = Auth::user();
        if(Publisher::where('email', $user->email)->exists()){

            $publisher = Publisher::where('email', $user->email)->first();
            $this->domains = Domain::where('publisher_id', $publisher->id)->get();
        
        } else {

            $this->domains = Domain::all();
        }
    }

    public function find(){

        $user = Auth::user();

        //SE FOR PUBLISHER, MOSTRA SOMENTE OS DOMAINS QUE PERTENCEM A ELE
        if(Publisher::where('email', $user->email)->exists()){

            $publisher = Publisher::where('email', $user->email)->first();
        
            $this->domains = Domain::where('publisher_id', $publisher->id)
                                    ->where(function($query){
                                        $query->where('domain', 'like', "%$this->input%")
                                        ->orWhere('id', $this->input);
                                    })->get();

        //SE FOR ADMIN, MOSTRA TODOS OS DOMAINS
        } else {

            $this->domains = Domain::where('id', $this->input)
                                    ->orWhere('domain', 'like', "%$this->input%")
                                    ->get();
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
        return view('livewire.report.index');
    }
}
