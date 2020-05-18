<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class crud111 extends Model
{
    use SoftDeletes;
    protected $fillable =[
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'status',
        'user_type',
        'created_by',
        'updated_by',
        'deleted_by',
        'image',
        'password',
        'email_verified_at'
    ];
}
