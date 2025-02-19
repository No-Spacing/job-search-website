<?php

use App\Livewire\Home;
use App\Livewire\Welcome;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

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


Route::get('/home', Home::class)->name('home');

Route::middleware(['UserCheck'])->group(function () {

    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);

});

Route::get('/logout', function () {
    Session::flush();
    return Redirect::to('/home');
});

