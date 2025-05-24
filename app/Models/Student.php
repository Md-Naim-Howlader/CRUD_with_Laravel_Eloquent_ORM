<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'photo',
        'skills',
        'contact',
        'dob',
        'address',
    ];

    use HasFactory;
}
