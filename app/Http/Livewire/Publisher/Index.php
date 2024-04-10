<?php

namespace App\Http\Livewire\Publisher;

use App\Models\Publisher;
use Livewire\Component;

class Index extends Component
{

    public Publisher $publisher;
    public $input;

    public $tempSort = 0;

    public function mount()
    {
        $this->publishers = Publisher::all();
    }

    public function find(){
        $this->publishers = Publisher::where('id', $this->input)
                                    ->Orwhere('name', 'like',  "%$this->input%")
                                    ->orWhere('phone', 'like',  "%$this->input%")
                                    ->orWhere('email', 'like',  "%$this->input%")
                                    ->orWhere('document', 'like',  "%$this->input%")
                                    ->get();
    }

    public function orderBy($campo)
    {
        if($this->tempSort == 1){
            $userArray = $this->publishers->sortByDesc($campo);
            $this->tempSort --;
        } 
        else if($this->tempSort == 0) {
            $userArray = $this->publishers->sortBy($campo);
            $this->tempSort ++;
        }

        $this->publishers = $userArray;    
    }
    public function render()
    {
        return view('livewire.publisher.index');
    }
}
