<?php

namespace App\Models\Bizx_User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class BizxUser extends Model implements AuditableContract
{

    use HasFactory;
    use Auditable;
    public $timestamps = false;
    protected $guarded = [];


    public function bizxUserType()
    {
        return $this->belongsTo(BizxUserType::class, 'user_type_code', 'code');
    }

    public function userSetting()
    {
       return $this->hasOne(UserSetting::class, 'user_code','code');
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }


}
