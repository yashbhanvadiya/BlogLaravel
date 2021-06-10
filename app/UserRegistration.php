<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    protected $fillable = [
        'name', 'email',
    ];
}
