<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class InstitutionUser extends Model
{
    use AuditingTrait, SoftDeletes;

  protected $fillable = ['user_id','institution_id'];
  public function institution()
  {
      return $this->belongsTo('App\Models\Institution');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
