<?php

namespace App\Models\Courier_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Courier extends Model implements AuditableContract
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];
    use Auditable;

 
}
