<?php

namespace App\Models\System_Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SystemPage extends Model implements AuditableContract
{
    use HasFactory;
    use Auditable;
    public $timestamps = false;
   // protected $guarded = [];
    protected $table='system_pages';

    
    public function systemPageGroup()
    {
        return $this->belongsTo(SystemPageGroup::class, 'system_page_group_code','code');
    }

    public function systemMenuActions()
    {
        return $this->hasMany(SystemMenuAction::class,'system_page_code','code');
    }

    public function users()
    {
       return $this->belongsToMany(User::class,'system_pages_users','system_page_code','user_id');
    }
}
