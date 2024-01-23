<?php

namespace App\Models\System_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SystemPageGroup extends Model implements  AuditableContract
{
    use HasFactory;
    use Auditable;
    protected $guarded = [];


    public function system()
    {
        return $this->belongsTo(System::class, 'system_code', 'code');
    }

    public function systemPages()
    {
        return $this->hasMany(SystemPage::class, 'system_page_group_code', 'code');
    }

    public function systemMenuActions()
    {
       return $this->hasMany(SystemMenuAction::class,'system_page_group_code','code');
    }
}
