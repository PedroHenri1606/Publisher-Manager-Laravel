<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class User_find extends Component
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

    public function orderById()
    {
        $this->users = User::orderBy('id','desc')->get();
    }

    public function orderByName()
    {
        $this->users = User::orderBy('name','desc')->get();
    }

    public function orderByEmail()
    {
        $this->users = User::orderBy('email','desc')->get();
    }
    
    public function orderByStatus()
    {
        $this->users = User::orderBy('status','desc')->get();
    }  

    public function render()
    {
        return view('livewire.user_find');
    }
}
