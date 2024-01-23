<?php

namespace App\Models\Parcel_Models;

use OwenIt\Auditing\Auditable;
use App\Models\Parcel_Models\Parcel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class ParcelImage extends Model implements AuditableContract
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];
    use Auditable;

    public function parcels()
    {
        return $this->belongsTo(Parcel::class);
    }
}
