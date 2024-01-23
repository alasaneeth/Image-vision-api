<?php

namespace App\Models\Courier_Models;

use OwenIt\Auditing\Auditable;
use App\Models\Courier_Models\Courier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Routes extends Model implements AuditableContract
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];
    use Auditable;

    public function courier()
    {
        return $this->belongsTo(Courier::class,'courier_code','code');
    }
}


