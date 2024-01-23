<?php

namespace App\Models\Stock_Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class StockTransfer extends Model  implements AuditableContract
{
    use HasFactory;
    use Auditable;
    public $timestamps=false;
    protected $guarded=[];
 
    
    public function stockHistories() 
    {
        return $this->hasMany(StockHistory::class, 'source_code','code' );
    }

    public function stockLocation()
    {
        return 
        $this->belongsTo(StockLocation::class, 'stock_location_code_from', 'code');
        $this->belongsTo(StockLocation::class, 'stock_location_code_to', 'code');
    } 
}
