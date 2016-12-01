<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $casts = [
        'stream' => 'array'
    ];

    protected $guarded = [];
}
