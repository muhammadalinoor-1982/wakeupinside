<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud111 extends Model
{
    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'status',
    ];
}
