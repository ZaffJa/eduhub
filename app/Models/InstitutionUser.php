<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutionUser extends Model
{

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
