<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Add 'name' to the fillable array
    protected $fillable = [
        'name',  // Add other fields as needed
        'c1',
        'c2',
        'moyenne',
        'efm',
        'general_note'
    ];
}
