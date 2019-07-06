<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    //
    protected $fillable = [
        'educations',
        'experiences',
        'skills',
        'cvUrl',
    ];

    protected $casts = [
        'educations' => 'array',
        'experiences' => 'array',
        'skills' => 'array',
        'cvUrl' => 'array',
    ];
}
