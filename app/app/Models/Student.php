<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'table_students';

    protected $fillable = [
        'image',
        'full_name',
        'gender',
        'jshshr',
        'passport_id',
        'faculty',
        'course',
        'group',
        'student_phone',
        'parents_phone',
        'address_type',
        'housing_type',
        'address',
        'owner',
        'owner_phone',
        'price',
        'contract',
    ];
}
