<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class Organisation extends Model
{
    use AuditingTrait, SoftDeletes;

    protected $fillable = [
        'name', 'abbreviation', 'type', 'address', 'phone',
        'fax', 'email', 'website'
    ];

    public function logo()
    {
        return $this->morphMany('App\Models\OrganisationFile', 'fileable')->where('organisation_files.type_id', '=', 1)->where('organisation_files.category_id', '=', 1);
    }

    public function files()
    {
        return $this->morphMany('App\Models\OrganisationFile', 'fileable');
    }
}
