<?php

namespace App\Models\Bizx_User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class BizxUserType extends Model implements AuditableContract
{

    use HasFactory;
    use Auditable;
    public $timestamps=false;
    protected $guarded = [];


    protected function bizxUsers()
    {
        return $this->hasMany(BizxUser::class,'user_type_code','code' );
    }
}


