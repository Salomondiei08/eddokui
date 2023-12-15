<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Actuality;
use App\Models\Home;

class WireWelcome extends Component
{
    public  $actualities, $homes, $componants;

    public function mount()
    {
       $this->actualities = Actuality::whereStatus(1)->get();
       //$this->homes = Home::whereStatus(1)->first();
       //$this->componants = Component::whereStatus(1)->get();

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
