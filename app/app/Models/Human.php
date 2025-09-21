<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    protected $fillable = [
        'jshshr',
        'passport_id',
        'role', // 'admin' yoki 'student'
    ];
}
