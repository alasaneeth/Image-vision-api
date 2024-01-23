<?php

namespace App\Models\Bizx_User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Setting extends Model implements AuditableContract
{

    use HasFactory , Auditable;
    public $timestamps = false;
    protected $guarded = [];

}
