<?php

namespace App\Models\Bizx_User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class UserSetting extends Model implements AuditableContract
{

    use HasFactory;
    use Auditable;
    public $timestamps = false;
    protected $guarded = [];


    public function bizxUser()
    {
        return $this->belongsTo(BizxUser::class, 'user_code', 'code');
    }

}
