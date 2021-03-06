<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable = [
        'name', 'titles','image','basicInfo','uToken','userId'
    ];

    protected $casts = [
        'basicInfo' => 'array',
        'titles' => 'array',
    ];

}
