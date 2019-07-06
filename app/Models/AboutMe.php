<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    //
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'generalInfo' => 'array',
        'testimonials' => 'array',
        'strengths' => 'array',
    ];
}
