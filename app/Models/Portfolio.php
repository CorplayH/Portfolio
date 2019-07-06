<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $fillable =[
        'allTags','details','allTypes','uToken','userId'
    ];

    protected $casts =[
        'allTags' => 'array',
        'details' => 'array',
        'allTypes' => 'array',
    ];
}
