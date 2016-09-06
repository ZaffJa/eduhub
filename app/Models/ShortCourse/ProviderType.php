<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderType extends Model
{
    use SoftDeletes;

    protected $table = 'short_provider_types';
    protected $fillable = ['name', 'slug'];

    public function parent()
    {
        return $this->belongsTo('App\Models\ShortCourse\ProviderType');
    }
}
