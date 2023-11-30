<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ControllerContacts extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enroler = new Contact();
        $enroler->name = request('name');
        $enroler->email = request('email');
        $enroler->message = request('message');
        $enroler->phone = request('phone');
       // $succes="Votre demande est en cours de traitement patientez";
        $enroler->save();
        return redirect('/');

    }



    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
