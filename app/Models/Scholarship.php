<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Scholarship extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $table = 'fundings';
    protected $fillable = ['name', 'abbreviation', 'website', 'description', 'deadline'];

    public function logo()
    {
        return $this->morphMany('App\Models\ScholarshipFile', 'fileable')->where('scholarship_files.type_id', '=', 1)->where('scholarship_files.category_id', '=', 1);
    }

    public function files()
    {
        return $this->morphMany('App\Models\ScholarshipFile', 'fileable');
    }
}
