<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WireAbout extends Component
{
    public function render()
    {
        return view('about')
        ->extends('layouts.app2', [
            'title' => 'A propos',
            //'actualities' => $this->actualities,
        ]);
    }
}
