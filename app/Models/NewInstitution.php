<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\AuditingTrait;

class NewInstitution extends Model
{
    use SoftDeletes,AuditingTrait;

    protected $fillable = [
        'user_id','name','description','established','location','address','website','email','image',
        'created_at','updated_at','deleted_at'
    ];

    public function status()
    {
        if($this->status == 0 ) return 'Pending';
        if($this->status == 1 ) return 'Accepted';

        return 'Rejected';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
