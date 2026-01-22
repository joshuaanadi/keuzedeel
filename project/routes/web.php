<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;

Route::resource('gebruikers', GebruikerController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
Route::get('/login', [GebruikerController::class, 'loginForm']);
Route::post('/login', [GebruikerController::class, 'login']);
Route::get('/dashboard', [GebruikerController::class, 'dashboard']);
Route::get('/welcome', [GebruikerController::class, 'welcome']);

