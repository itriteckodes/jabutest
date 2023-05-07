<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Main extends Component
{
    public $tasktab = 1;

    protected $queryString = ['tasktab']; 
    public function render()
    {
        return view('livewire.main.main');
    }
}
