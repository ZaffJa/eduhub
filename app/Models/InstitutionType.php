<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionType extends Model
{
    use SoftDeletes;

    protected $fillable = ['parent_id', 'name', 'slug'];

    public function parent()
    {
        return $this->belongsTo('App\Models\InstitutionType');
    }
}
