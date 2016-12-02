<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $casts = [
        'stream' => 'array'
    ];

    protected $fillable = [
        'id', 'type', 'ppd', 'code', 'school_type_id', 'name', 'address', 'postcode',
        'city', 'state', 'telephone', 'fax', 'stream', 'created_at', 'updated_at', 'deleted_at'
    ];
}
