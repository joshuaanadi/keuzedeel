<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GebruikerController;

// Registration
Route::get('/register', [GebruikerController::class, 'registerForm']);
Route::post('/register', [GebruikerController::class, 'register']);
// Login
Route::get('/login', [GebruikerController::class, 'loginForm']);
Route::post('/login', [GebruikerController::class, 'login']);
// Logout
Route::post('/logout', [GebruikerController::class, 'logout']);
// Pages
Route::get('/home', [GebruikerController::class, 'home']);
Route::get('/dashboard', [GebruikerController::class, 'dashboard']);
// Admin
Route::get('/gebruikers/{id}/edit', [GebruikerController::class, 'edit']);
Route::put('/gebruikers/{id}', [GebruikerController::class, 'update']);
Route::delete('/gebruikers/{id}', [GebruikerController::class, 'destroy']);

