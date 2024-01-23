<?php

namespace App\Models\System_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SystemMenuAction extends Model implements AuditableContract
{
    use HasFactory;
    use Auditable;
    protected $guarded =[];

    
    public function systemPageGroup()
    {
       return $this->belongsTo(SystemPageGroup::class,'system_page_group_code','code');
    }

    public function systemPage()
    {
        return $this->belongsTo(SystemPage::class,'system_page_code','code');
    }
}

