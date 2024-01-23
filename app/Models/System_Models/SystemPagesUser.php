<?php

namespace App\Models\System_Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SystemPagesUser extends Model implements AuditableContract
{
    use HasFactory;
    use Auditable;
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    // public function user()
    // {
    //     return $this->hasMany(User::class, 'user_id','id');
    // }
    // public function systemPage()
    // {
    //     return $this->hasMany(SystemPage::class,'system_page_code','code');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
    public function systemPage()
    {
        return $this->belongsTo(SystemPage::class,'system_page_code','code');
    }
}
