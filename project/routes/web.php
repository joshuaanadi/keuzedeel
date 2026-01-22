<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;

Route::get('/register', function() { return view('gebruiker.register'); });
Route::post('/register', [GebruikerController::class, 'register']);

Route::get('/login', function() { return view('gebruiker.login'); });
Route::post('/login', [GebruikerController::class, 'login']);

Route::get('/gebruikers/{id}/edit', function($id){
    $gebruiker = App\Models\Gebruiker::find($id);
    return view('gebruiker.edit', ['gebruiker' => $gebruiker]);
});
Route::put('/gebruikers/{id}', [GebruikerController::class, 'update']);
Route::delete('/gebruikers/{id}', [GebruikerController::class, 'destroy']);

Route::get('/dashboard', [GebruikerController::class, 'dashboard']);
Route::get('/welcome', [GebruikerController::class, 'welcome']);

