<?php

namespace App\Models;

use App\Models\System_Models\SystemPage;
use App\Models\System_Models\SystemPagesUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements AuditableContract {

    use HasFactory, HasApiTokens, Notifiable;
    use Auditable;
    public $timestamps=false;
    protected $guarded = [];


    protected $hidden = [
        'password',
    ];
   
    public function systemPages()
    {
        return $this->belongsToMany(SystemPage::class, 'system_pages_users','user_id','system_page_code');
    }

    public function role()
    {
        return $this->hasOne(UserRole::class, 'user_id');
    }
}
