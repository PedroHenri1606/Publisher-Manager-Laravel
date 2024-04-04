<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Find extends Component
{
    public $input;
    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function find()
    {
        $this->users = User::where('id', $this->input)->orWhere('email','like', '%'.$this->input .'%')->orWhere('name', $this->input)->get();
        
    }
    public function render()
    {
        return view('livewire.find');
    }
}
