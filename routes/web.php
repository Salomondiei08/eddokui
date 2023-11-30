<?php
use App\Models\User;
use App\Http\Livewire\WireUser;
use App\Http\Livewire\WireAbout;
use App\Http\Livewire\WireContact;
use App\Http\Livewire\WireStudent;
use App\Http\Livewire\WireWelcome;
use App\Http\Controllers\Recensement;
use App\Http\Livewire\WireChoiceYear;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YearCntroller;
use App\Http\Controllers\ControllerContacts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', WireWelcome::class)->name('welcome');

Route::get('/message', function(){
    return view('Message');
})->name('message');
Route::post('/user/profile', function () {
    // Validate the request...
    return back()->withInput();
});
Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');

Route::post('/contacts', [ControllerContacts::class, 'create'])->name('contacts');
Route::get('/student', WireStudent::class)->name('student');
Route::get('/about', WireAbout::class)->name('about');
