<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\AuditingTrait;

class RegisterInstitution extends Model
{
	use AuditingTrait;

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function institution()
    {
      return $this->belongsTo('App\Models\Institution');
    }
}
