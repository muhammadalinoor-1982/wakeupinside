<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class crud extends Model
{
    use SoftDeletes;

    protected $fillable =
    [
        'name',
        'phone',
        'email',
        'email_verified_at',
        'address',
        'image',
        'password',
        'gender',
        'user_type',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
        ];
}
