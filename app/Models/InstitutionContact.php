<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class InstitutionContact extends Model
{
    use AuditingTrait, SoftDeletes;

    public function institution()
	{
		return $this->belongsTo('App\Models\Institution','institution_id','id');
	}
    public function contact()
	{
		return $this->belongsTo('App\Models\ContactType','contact_type_id','id');
	}

}
