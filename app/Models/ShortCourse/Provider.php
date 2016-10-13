<?php

namespace App\Models\ShortCourse;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $table = 'short_providers';
    protected $fillable = [
        'type_id', 'parent_id', 'name', 'slug', 'abbreviation',
        'description', 'established', 'location', 'bank_name','website',
        'facebook','instagram','phone','bank_account','bank_type_id'
    ];

    protected $hidden = [
      'bank_name','bank_account','profile_pic_location'
    ];

    public function courses()
    {
        return $this->hasMany('App\Models\ShortCourse\Course');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ShortCourse\ProviderType');
    }

    public function logo()
    {
        return $this->morphMany('App\Models\ShortCourse\File', 'fileable')->where('short_files.type_id', '=', 1)->where('short_files.category_id', '=', 1);
    }

    public function files()
    {
        return $this->morphMany('App\Models\ShortCourse\File', 'fileable');
    }

    public function bank()
    {
        return $this->belongsTo('App\Models\BankType','bank_type_id','id');
    }

    public function profilePic()
    {
        return $this->belongsTo('App\Models\ShortCourse\File','id','fileable_id');
    }

}
