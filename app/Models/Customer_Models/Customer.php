<?php

namespace App\Models\Customer_Models;


use App\Models\Invoice_Models\Invoice;
use App\Models\Invoice_Models\SalesReturn;
use App\Models\PaymentReceipt_Models\ChequePayment;
use App\Models\PaymentReceipt_Models\PaymentReceipt;
use App\Models\CustomerChequeReturnPayment_Models\CusCheqReturnReceipt;
use App\Models\StockIsssue_Models\StockIsssue;
use App\Models\Stock_Models\Route;
use App\Models\Stock_Models\SalesRep;
use App\Models\Vehicle_Models\VehicleMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Customer extends Model implements AuditableContract
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = [];
    use Auditable;


}
