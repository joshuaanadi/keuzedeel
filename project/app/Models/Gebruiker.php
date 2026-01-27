<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Gebruiker extends Authenticatable
{
    use HasFactory;

    protected $table = 'gebruikers';

    protected $fillable = [
        'email',
        'studentnummer',
        'password',
        'name',
        'role',
        'klas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
