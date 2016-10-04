<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;

class ActivateShortProvider extends Model
{
    protected $fillable = [
        'email','token'
    ];
}
