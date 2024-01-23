<?php

namespace App\Models\System_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class System extends Model   implements AuditableContract
{
    use HasFactory;
    use Auditable;

    
    public function systemPageGroups()
    {
        return $this->hasMany(SystemPageGroup::class, 'system_code', 'code');
    }
}
