<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
Use App\Http\Livewire\toast;
use App\Models\Student;

class WireStudent extends Component
{
    use LivewireAlert;

    public  $enfant, $papa, $mam, $parent_id, $type_parent, $slug;
    public  $last_name, $first_name,  $sex, $address, $phone, $email, $birth_at, $birth_place, $activity_group, $date_enter, $status, $orph, $content, $orphelin, $bio ,$habita, $desc;

    public  $last_papa, $first_papa, $email_papa, $phone_papa, $address_papa, $job_parent, $religion, $church;
    public  $last_mam, $first_mam, $email_mam, $phone_mam, $address_mam, $job_mam, $religion_mam, $church_mam;

    public $totalSteps = 3;
    public $currentStep = 1;


    public function mount()
    {
        $this->currentStep = 1;
    }

    public function validated(){
        if($this->currentStep == 1){
            $this->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'sex' => 'required',
                'address' => 'max:255',
                'desc' => 'max:255',
                'phone' => 'unique:students,phone',
                'email' => 'unique:students,email',
                'birth_at' => 'date',
                'birth_place' => 'max:255',
                'activity_group' => 'max:255',
                'date_enter' => 'date',
                'orph' => 'required',
                'habita' => 'required|max:255',
                'orphelin' => 'max:255', //description orphelin
                'bio' => 'required|max:255',
                'content' => 'max:255', //remarques
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'address' => 'max:255',
                'phone' => 'unique:students,phone',
                'email' => 'unique:students,email',

                'job_parent' => 'max:255',
                'religion' => 'max:255',
                'church' => 'max:255',
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'last_name' => 'required',
                'first_name' => 'required',
                'address' => 'max:255',
                'phone' => 'unique:students,phone',
                'email' => 'unique:students,email',

                'job_parent' => 'max:255',
                'religion' => 'max:255',
                'church' => 'max:255',
            ]);
        }
    }
    public function increaseStep()
    {
        $this->resetErrorBag();
        //$this->validated();
            $this->currentStep++;
            if($this->currentStep > $this->totalSteps){
                $this->currentStep = $this->totalSteps;
            }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }
    public function render()
    {
        return view('student')
        ->extends('layouts.app');
    }


    public function Send()
    {
        //dd($this->pseudo);
        //dd($this->last_name, $this->first_name, $this->sex, $this->address, $this->phone, $this->email, $this->birth_at, $this->birth_place, $this->activity_group, $this->date_enter, $this->status, $this->pseudo, $this->content, $this->orphelin, $this->last_papa, $this->first_papa, $this->email_papa, $this->phone_papa, $this->address_papa, $this->job_parent, $this->religion, $this->church); ;

       /*  $this->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'sex' => 'required',
            'address' => 'max:255',
            'phone' => 'unique:users,phone',
            'email' => 'unique:users,email',
            'birth_at' => 'date',
            'birth_place' => 'max:255',
            'activity_group' => 'max:255',
            'date_enter' => 'date',
            //'status' => 'required',

            'orph' => 'required',
            'orphelin' => 'max:255', //description orphelin
            'bio' => 'required|max:255',
            'content' => 'max:255', //remarques

            'job_parent' => 'max:255',
            'religion' => 'max:255',
            'church' => 'max:255',
        ]); */

        Student::create([
            'type_parent' => 'enfant',
            'last_name' => $this-> last_name,
            'first_name' => $this-> first_name,
            'sex' => $this-> sex,
            'address' => $this-> address,
            'phone' => $this-> phone,
            'email' => $this-> email,
            'birth_at' => $this-> birth_at,
            'birth_place' => $this-> birth_place,
            'activity_group' => $this-> activity_group,
            'date_enter' => $this-> date_enter,
            'status' => $this-> status,
            'orphelin' => $this-> orphelin,
            'orph' => $this-> orph,
            'bio' => $this-> bio,
            'desc'=> $this-> desc,
            'habita'=> $this-> habita,
            'content' => $this->content,
        ]);

        Student::create([
            'type_parent' => 'papa',
            'last_name' => $this-> last_papa,
            'first_name' => $this-> first_papa,
            'email' => $this-> email_papa,
            'phone' => $this-> phone_papa,
            'job_parent' => $this-> job_parent,
            'address' => $this-> address_papa,
            'religion' => $this-> religion,
            'church' => $this-> church,
        ]);

        Student::create([
            'type_parent' => 'mam',
            'last_name' => $this-> last_mam,
            'first_name' => $this-> first_mam,
            'email' => $this-> email_mam,
            'phone' => $this-> phone_mam,
            'job_parent' => $this-> job_mam,
            'address' => $this-> address_mam,
            'religion' => $this-> religion_mam,
            'church' => $this->church_mam,
        ]);

      /*   $this->reset([  'last_name',
                        'first_name',
                        'email',
                        'phone',
                        'address',
                        'date_enter',
                        'status',
                        'content',
                        'orphelin',
                        'pseudo',
                        'activity_group',
                        'job_parent',
                        'religion',
                        'church',
                        'sex',
                        'birth_at',
                        'birth_place',]); */

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
