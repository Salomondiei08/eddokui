<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actuality;

class WireWelcome extends Component
{
    public  $actualities;

    public function mount()
    {
       $this->actualities = Actuality::whereStatus(1)->get();
       //dd($this->actualities->toArray());
    }
    public function render()
    {
        return view('welcome')
        ->extends('layouts.app2', [
            'title' => 'Accueil',
            //'actualities' => $this->actualities,
        ]);
    }
}
