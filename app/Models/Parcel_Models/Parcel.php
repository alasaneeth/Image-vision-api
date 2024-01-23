<?php

namespace App\Models\Parcel_Models;

use OwenIt\Auditing\Auditable;
use App\Models\Courier_Models\Routes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer_Models\Customer;
use App\Models\Parcel_Models\ParcelImage;
use App\Models\Stock_Models\StockLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Parcel extends Model implements AuditableContract
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];
    use Auditable;

public function parcelImages()
{
    return $this->hasMany(ParcelImage::class, 'parcel_code', 'code');
}

public function customer()
{
    return $this->belongsTo(Customer::class, 'customer_code', 'code');
}
public function fromLocation()
{
    return $this->belongsTo(StockLocation::class, 'from_location_code', 'code');
}
public function toLocation()
{
    return $this->belongsTo(StockLocation::class, 'to_location_code', 'code');
}
public function route()
{
    return $this->belongsTo(Routes::class, 'route_code', 'code');
}

}
