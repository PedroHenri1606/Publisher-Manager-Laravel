<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{

    public $input;
    public $users;
    public $tempSort = 0;

    public function mount()
    {
        $this->users = User::all();
    }

    public function find()
    {
        $this->users = User::where('id', $this->input)
                            ->orWhere('email','like', "%$this->input%")
                            ->orWhere('name', 'like',"%$this->input%")
                            ->get();
    }

    public function orderBy($campo)
    {
        if($this->tempSort == 1){
            $userArray = $this->users->sortByDesc($campo);
            $this->tempSort --;
        } 
        else if($this->tempSort == 0) {
            $userArray = $this->users->sortBy($campo);
            $this->tempSort ++;
        }

        $this->users = $userArray;    
    }
    
    public function orderByStatus()
    {
        $primeiroRegistro = $this->users->first();

        if($primeiroRegistro['status'] == 1){
            $userArray = $this->users->sortByDesc('status');
        } 
        else {
            $userArray = $this->users->sortBy('status');
        }

        $this->users = $userArray;
    }  

    public function render()
    {
        return view('livewire.user.index');
    }
}
