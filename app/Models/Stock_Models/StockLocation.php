<?php

namespace App\Models\Stock_Models;

use App\Models\Invoice_Models\Invoice;
use App\Models\Invoice_Models\SalesReturn;
use App\Models\StockIssue_Models\StockIssue;
use App\Models\Supplier_Models\PurchaseReturn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class StockLocation extends Model  implements AuditableContract
{
    use HasFactory;
    use Auditable;
    public $timestamps=false;
    protected $guarded=[];


    public function stockIssues() 
    {
        return $this->hasMany(StockIssue::class, 'stock_location_code','code');
    }

    public function salesReturns() 
    {
        return $this->hasMany(SalesReturn::class, 'stock_location_code','code');
    }

    public function purchaseReturns() 
    {
        return $this->hasMany(PurchaseReturn::class, 'stock_location_code','code');
    }

    public function invoices() 
    {
        return $this->hasMany(Invoice::class, 'stock_location_code','code');
    }

    public function grns() 
    {
        return $this->hasMany(Grn::class, 'stock_location_code','code');
    }
    
    public function stocks() 
    {
        return $this->hasMany(StockHistory::class, 'stock_location_code','code');
    }

    public function stockTransfer() 
    {
        return 
        $this->hasMany(StockTransfer::class, 'stock_location_code_from','code'); 
        $this->hasMany(StockTransfer::class, 'stock_location_code_to','code');      
    }  
    
    public function stockIns() 
    {
        return $this->hasMany(StockIn::class, 'stock_location_code','code');
    }
}
