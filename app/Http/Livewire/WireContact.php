<?php

namespace App\Http\Livewire;
use App\Models\Contact;
//use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
Use App\Http\Livewire\toast;

class WireContact extends Component

{
    use LivewireAlert;
    
    public $name, $email , $message,$phone;

    public function render()
    {
        return view('contactsss')->extends('layouts.app1');
    }
  
   
    public function Send()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique',
            //'subject' => 'required',
            'message' => 'required',
            'phone'=>'required|unique'
        ]); 
        Contact::create([
            'name' => $this-> name,
            'email' => $this-> email,
            //'subject' => $this-> subject,
            'address' => $this-> address,
            'phone'=>$this->phone
        ]);
          
      
        
        $this->alert('success', 'Enrégistrement effectué avec succès', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
            'showCancelButton' => true,
            'cancelButtonText' => 'Fermer',
        ]);

        return redirect()->route('welcome');
    }

}
