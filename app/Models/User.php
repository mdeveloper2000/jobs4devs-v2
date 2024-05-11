<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'phone',
        'scholarity'
    ];
}
