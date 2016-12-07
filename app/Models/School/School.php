<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{

    use softDeletes;

    protected $casts = [
        'stream' => 'array'
    ];

    protected $fillable = [
        'id', 'type', 'ppd', 'code', 'school_type_id', 'name', 'address', 'postcode',
        'city', 'state', 'telephone', 'fax', 'stream_type_id','rank','created_at', 'updated_at', 'deleted_at'
    ];
}
