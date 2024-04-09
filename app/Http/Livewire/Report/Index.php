<?php

namespace App\Http\Livewire\Report;

use App\Models\Domain;
use Livewire\Component;

class Index extends Component
{

    public $domains;

    public function mount(){
        $this->domains  = Domain::all();
    }

    public function render()
    {
        return view('livewire.report.index');
    }
}
