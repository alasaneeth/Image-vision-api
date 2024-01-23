<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\System_Models\SystemPage;
use App\Http\Controllers\ImageController;
use App\Models\AccountTransaction_Models\LedgerType;
use App\Http\Controllers\Bank_Controllers\BankController;
use App\Http\Controllers\Stock_Controllers\GrnController;
use App\Http\Controllers\Stock_Controllers\StockController;
use App\Http\Controllers\Item_Controllers\ItemUnitController;


//------------User Controller---------------------------------------
use App\Http\Controllers\Parcel_Controllers\ParcelController;
use App\Http\Controllers\Stock_Controllers\StockInController;
use App\Http\Controllers\Bizx_User_Controllers\AuthController;
use App\Http\Controllers\Courier_Controllers\RoutesController;


//------------Customer_Controller-------------------------------------
use App\Http\Controllers\Item_Controllers\ItemBrandController;
use App\Http\Controllers\Item_Controllers\ItemColorController;
use App\Http\Controllers\Item_Controllers\ItemImageController;
use App\Http\Controllers\Bank_Controllers\BankBranchController;
use App\Http\Controllers\Courier_Controllers\CourierController;
use App\Http\Controllers\Expense_Controllers\ExpenseController;
use App\Http\Controllers\Invoice_Controllers\InvoiceController;
use App\Http\Controllers\Item_Controllers\ItemMasterController;
//---------------END----------------------------------------------------------

//--------------------------courier Controller--------------------------------




//------------------------end Courier Controller--------------------------------

//-----------------Bank-------------------------------------------
use App\Http\Controllers\Stock_Controllers\StockBatchController;
use App\Http\Controllers\Bizx_User_Controllers\SettingController;

//-------------------END---------------------------------------------


//-------------------Department Controller---------------------------
use App\Http\Controllers\Customer_Controllers\CustomerController;

//-------------------END---------------------------------------------

//--------------Item Controller-----------------------------------------------
use App\Http\Controllers\Item_Controllers\ItemCategoryController;
use App\Http\Controllers\Stock_Controllers\MatureStockController;
use App\Http\Controllers\Supplier_Controllers\SupplierController;
use App\Http\Controllers\Bizx_User_Controllers\BizxUserController;
use App\Http\Controllers\Bizx_User_Controllers\UserTypeController;
use App\Http\Controllers\E_Commerce_Controller\ItemEcomController;
use App\Http\Controllers\Report_Controllers\SalesReportController;
use App\Http\Controllers\Report_Controllers\StockReportController;
//----------------END---------------------------------------------------------

//---------------Supplier Controller------------------------------------------
use App\Http\Controllers\Stock_Controllers\GrnItemPriceController;
use App\Http\Controllers\Stock_Controllers\StockHistoryController;
use App\Http\Controllers\Customer_Controllers\SalesOrderController;
use App\Http\Controllers\E_Commerce_Controller\stockEcomController;
use App\Http\Controllers\Expense_Controllers\ExpenseTypeController;


//---------------END----------------------------------------------------------

//--------------Stock Controller----------------------------------------------
use App\Http\Controllers\Invoice_Controllers\InvoiceDataController;
use App\Http\Controllers\Invoice_Controllers\SalesReturnController;
use App\Http\Controllers\Payment_Controllers\CashPaymentController;
use App\Http\Controllers\Payment_Controllers\PaymentTypeController;
use App\Http\Controllers\Stock_Controllers\StockLocationController;
use App\Http\Controllers\Stock_Controllers\StockTransferController;
use App\Http\Controllers\Vehicle_Controllers\VehicleTypeController;
use App\Http\Controllers\Day_End_Controllers\DayEndByCashController;
use App\Http\Controllers\Item_Controllers\ItemBinLocationController;
use App\Http\Controllers\Item_Controllers\ItemSubCategoryController;
//--------------END-------------------------------------------------------------

//--------------System_Pages_Controllers-----------------------------------------
use App\Http\Controllers\Report_Controllers\ExpenseReportController;
use App\Http\Controllers\Report_Controllers\SummaryReportController;
//--------------END-------------------------------------------------------------

//-------------------Invoice_Controllers-----------------------------------------
use App\Http\Controllers\Vehicle_Controllers\VehicleBrandController;
use App\Http\Controllers\Bizx_User_Controllers\UserSettingController;
use App\Http\Controllers\Customer_Controllers\CustomerTypeController;
use App\Http\Controllers\Department_Controllers\DepartmentController;
use App\Http\Controllers\Invoice_Controllers\InvoiceSourceController;

//---------------------END---------------------------------------------------

//-----------------------Expenses Controller---------------------------------
use App\Http\Controllers\Payment_Controllers\ChequePaymentController;
use App\Http\Controllers\Report_Controllers\CustomerReportController;
use App\Http\Controllers\Report_Controllers\PurchaseReportController;
use App\Http\Controllers\Report_Controllers\SupplierReportController;
//-----------------------END-------------------------------------------------

//-----------------------Payment Controllers---------------------------------
use App\Http\Controllers\StockIssue_Controllers\StockIssueController;
use App\Http\Controllers\Vehicle_Controllers\ServiceMasterController;
use App\Http\Controllers\Vehicle_Controllers\VehicleMasterController;
use App\Http\Controllers\Expense_Controllers\ExpensePaymentController;

//-----------------------END-------------------------------------------------




//-----------------------Payment Voucher---------------------------------
use App\Http\Controllers\Payment_Controllers\PaymentReceiptController;
use App\Http\Controllers\Vehicle_Controllers\ServicePackageController;
use App\Http\Controllers\Customer_Controllers\SalesQuotationController;
use App\Http\Controllers\Expense_Controllers\ExpenseCategoryController;
use App\Http\Controllers\Invoice_Controllers\InvoiceAutoCareController;
use App\Http\Controllers\Supplier_Controllers\PurchaseReturnController;



//-----------------------END-------------------------------------------------

//-----------------------Payment Receipt Controllers---------------------------------

use App\Http\Controllers\System_Pages_Controllers\SystemPageController;
use App\Http\Controllers\Customer_Controllers\CustomerAddressController;

use App\Http\Controllers\Customer_Controllers\CustomerContactController;
// use App\Http\Controllers\Payment_Receipt_Controllers\PaymentReceiptController;
//-----------------------END-------------------------------------------------


//---------------------- Vehicle Controller---------------------------------------
use App\Http\Controllers\Supplier_Controllers\SupplierAddressController;
use App\Http\Controllers\StockIssue_Controllers\StockIssueTypeController;
use App\Http\Controllers\Report_Controllers\ChequeReceiptReportController;
use App\Http\Controllers\Report_Controllers\ChequeVoucherReportController;
use App\Http\Controllers\Invoice_Controllers\InvoiceWithPackSizeController;
//---------------------------END -------------------------------------------------



//-------------Accounts Controler---------------------------------------------
use App\Http\Controllers\Report_Controllers\PaymentReceiptReportController;
use App\Http\Controllers\General_Ledger_Controllers\GeneralLedgerController;
use App\Http\Controllers\Stock_Controllers\StockHistoryExtInvoiceController;
use App\Http\Controllers\Account_Transaction_Controller\EntryTypesController;
use App\Http\Controllers\Account_Transaction_Controller\LedgerTypeController;
use App\Http\Controllers\Customer_Controllers\CustomerContactsTypeController;
//---------------------------END -------------------------------------------------

//-------------------------Reports Controllers------------------------------------
use App\Http\Controllers\PaymentVoucher_Controllers\PaymentVoucherController;
use App\Http\Controllers\System_Pages_Controllers\SystemMenuActionController;
use App\Http\Controllers\Customer_Controllers\CustomerBillingAddressController;
use App\Http\Controllers\Supplier_Controllers\SupplierBillingAddressController;
use App\Http\Controllers\Customer_Controllers\CustomerShippingAddressController;
use App\Http\Controllers\Supplier_Controllers\SupplierShippingAddressController;
use App\Http\Controllers\Account_Transaction_Controller\AccJournalTypeController;
use App\Http\Controllers\Account_Transaction_Controller\ClosingBalanceController;
use App\Http\Controllers\PaymentVoucher_Controllers\SupplierGrnPaymentController;
use App\Http\Controllers\Payment_Receipt_Controllers\BankPaymentReceiptController;
use App\Http\Controllers\Payment_Receipt_Controllers\CardPaymentReceiptController;
use App\Http\Controllers\PaymentVoucher_Controllers\SupplierBankPaymentController;
use App\Http\Controllers\PaymentVoucher_Controllers\SupplierCardPaymentController;

//---------------------------END -------------------------------------------------


//---------------------------Report Location Based COntroller--------------------------
use App\Http\Controllers\Payment_Controllers\CustomerChequeReturnReceiptController;
use App\Http\Controllers\PaymentVoucher_Controllers\SupplierChequePaymentController;
use App\Http\Controllers\PaymentVoucher_Controllers\SupplierModeOfPaymentController;
use App\Http\Controllers\Account_Transaction_Controller\AccountTransactionController;
use App\Http\Controllers\Account_Transaction_Controller\EntryTypeTransactionController;
use App\Http\Controllers\Report_Location_Based_Controller\SalesLocationReportController;
use App\Http\Controllers\Report_Location_Based_Controller\StockLocationReportController;
use App\Http\Controllers\Account_Transaction_Controller\AccountTransactionTypeController;
use App\Http\Controllers\Report_Location_Based_Controller\ExpenseLocationReportController;
use App\Http\Controllers\Report_Location_Based_Controller\CustomerLocationReportController;
use App\Http\Controllers\Report_Location_Based_Controller\PurchaseLocationReportController;
use App\Http\Controllers\Report_Location_Based_Controller\PaymentReceiptLocationReportController;
use App\Http\Controllers\Report_Location_Based_Controller\PaymentVoucherLocationReportController;

//---------------------------END -------------------------------------------------


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// UNAUTHENTICATED ROUTES HERE
Route::group(['prefix' => 'v1'], function () {
    Route::post('login', [AuthController::class, 'logIn']);
    Route::post('/me', [AuthController::class, 'me']);
    Route::resource('vehicle-type', VehicleTypeController::class);
    Route::resource('payment-type', PaymentTypeController::class);
    Route::resource('vehicle-brand', VehicleBrandController::class);
    Route::get('get-stock-location', [StockLocationController::class, 'index']);
    Route::resource('e-commerce-item', ItemEcomController::class);
    Route::resource('e-commerce-stock', stockEcomController::class);
    Route::get('e-commerce-stock-show/{id}', [stockEcomController::class, 'show']);
    Route::get('e-commerce-item-show/{id}', [ItemEcomController::class, 'show']);
 

    Route::get('getSystemPagesByUser', [SystemPage::class, 'getSystemPagesByUser']);

   
});

// Authenticated routes here
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    Route::get('sign-in-with-user', [AuthController::class, 'signInWithUser']);
    Route::post('logout', [AuthController::class, 'logout']);

    //Route::get('item-price-search-location/{key}', [InvoiceController::class, 'itemPriceSearchLocationBased']);

    //--------------------------User Table-----------------------------
   // Route::resource('user', BizxUserController::class);
    Route::resource('user', UserController::class);

    Route::get('user-search/{key}', [BizxUserController::class, 'userSearch']);

    Route::resource('user-type', UserTypeController::class);
    Route::resource('user-setting', UserSettingController::class);
    Route::resource('setting', SettingController::class);
    Route::put('image-update', [SettingController::class, 'updateImage']);

Route::get('images', [ImageController::class, 'index'])->name('images');
Route::post('images', [ImageController::class, 'upload'])->name('images');

    //-------------------------END------------------------------------------



    //------------Customer_Controllers-------------------------------------
    Route::resource('customer', CustomerController::class);
    Route::get('customer-search/{key}', [CustomerController::class, 'customerSearch']);
    Route::resource('customer-type', CustomerTypeController::class);
    Route::resource('contacts-type', CustomerContactsTypeController::class);
    Route::resource('customer-contact', CustomerContactController::class);
    Route::resource('customer-address', CustomerAddressController::class);
    Route::resource('customer-billing-address', CustomerBillingAddressController::class);
    Route::resource('customer-shipping-address', CustomerShippingAddressController::class);

    //----------------------------END---------------------------------------

    //---------------------------courier controller-------------------------

    Route::resource('couier', CourierController::class);
    Route::get('courier-search/{key}', [CourierController::class, 'courierSearch']);
    Route::resource('courier-route', RoutesController::class);
    Route::get('courier-route-search/{key}', [RoutesController::class, 'routeSearchSearch']);
    //--------------------------End of Courier Controller-------------------

    //--------------Parcel Controller-------------------------------------------
    Route::resource('parcel', ParcelController::class);
    Route::get('parcel-search/{key}', [ParcelController::class, 'parcelSearch']);
    Route::get('fetch-parcel-details/{key}', [ParcelController::class, 'fetchParcelDetails']);
    Route::get('received-parcel', [ParcelController::class, 'receivedParcel']);





    
    //-----------------END----------------------------------------------------


    //----------------Sales Quotation Controller---------------------------------------------
    Route::get('sales-quotation-customer/{key}', [SalesQuotationController::class, 'getSalesQuotationByCustomer']);
    Route::get('sales-quotation-search/{key}', [SalesQuotationController::class, 'salesQuotationSearch']);
    Route::get('sales-quotation-item-search/{key}', [SalesQuotationController::class, 'itemSearchForQuotation']);


    Route::resource('sales-quotation', SalesQuotationController::class);

    //---------------END----------------------------------------------------------

    Route::get('grn-outstanding-supplier/{key}', [GrnController::class, 'outstandingGrnForSupplier']);


    Route::resource('stock-location', StockLocationController::class); 
    Route::get('location-search/{key}', [StockLocationController::class, 'locationSerach']);
    Route::resource('stock-history', StockHistoryController::class);
    //Route::resource('stock-history-ext', StockHistoryExtInvoiceController::class);
    Route::resource('stock-batch', StockBatchController::class);
    Route::resource('stock-transfer', StockTransferController::class);
    Route::put('stock-transfer-locked', [StockTransferController::class, 'stockTransferLocked']);
    Route::resource('stock-issue', StockIssueController::class);
    Route::resource('stock-issue-type', StockIssueTypeController::class);
    
    Route::put('stock-issue-locked', [StockIssueController::class, 'stockIssueLocked']);
    Route::resource('mature-stock', MatureStockController::class);
    //----------------------END---------------------------------------------------


    //--------------------------Accounts Transaction-------------------
    Route::resource('account-transaction', AccountTransactionController::class);
    Route::resource('journal-type', AccJournalTypeController::class);
    Route::get('journal-type-search/{key}', [AccJournalTypeController::class, 'journalTypeSearch']);
    //Route::resource('entry-type-transaction', EntryTypesController::class);
    //Route::get('entry-type-transaction-search/{key}', [EntryTypesController::class, 'entryTypeTransactionSearch']);

    Route::resource('ledger-type', LedgerTypeController::class);
    Route::get('ledger-type-search/{key}', [LedgerTypeController::class, 'ledgerTypeSearch']);
   

    //----------------------END---------------------------------------------------



    //-----------------------------Department---------------------------------
    Route::resource('department', DepartmentController::class);
    Route::get('department-search/{key}', [DepartmentController::class, 'departmentSearch']);

    //----------------------END---------------------------------------------------



    //----------------System Pages---------------------------------------------
    Route::resource('pages', SystemPageController::class);
    Route::resource('menu-action', SystemMenuActionController::class);
    Route::get('pages-by-user', [SystemPageController::class, 'getPagesByUser']);
    //----------------------END---------------------------------------------------

    //-------------------Invoice Controller-----------------------------------------
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice_pack', InvoiceWithPackSizeController::class);
    Route::put('invoice-reversal', [InvoiceController::class, 'reversal']);
    Route::get('recent-invoice/{key}', [InvoiceController::class, 'recentInvoice']);
    Route::get('invoice-search/{key}', [InvoiceController::class, 'invoiceSearch']);
    Route::get('invoice-outstanding-customer/{key}', [InvoiceController::class, 'outstandingInvoiceForCustomer']);
    Route::get('item-price-search-location/{key}', [InvoiceController::class, 'itemPriceSearchLocationBased']);
    //Route::resource('invoice-data', InvoiceDataController::class);
    Route::resource('invoice-source', InvoiceSourceController::class);
    //---------------------END---------------------------------------------------

    //-------------------Sales Return Controller-----------------------------------------

    Route::resource('sales-return', SalesReturnController::class);
    Route::put('sales-return-reversal', [SalesReturnController::class, 'reversal']);


    //---------------------END---------------------------------------------------


    //-------------------Invoice Controller-----------------------------------------
    Route::resource('invoice-autocare', InvoiceAutoCareController::class);


    //---------------------END---------------------------------------------------


    //-------------------Expenses Controller-----------------------------------------
    Route::resource('expenses-type', ExpenseTypeController::class);
    Route::resource('expenses-category', ExpenseCategoryController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('expenses-payment', ExpensePaymentController::class);
    //---------------------END---------------------------------------------------

    //-------------------Bank Controller-----------------------------------------
    Route::resource('bank-branch', BankBranchController::class);
    Route::resource('bank', BankController::class);

    //---------------------END-------------------------------------[--------------

    //-------------------Payment Controller-----------------------------------------
    Route::resource('cash-payment', CashPaymentController::class);
    Route::resource('payment-master', PaymentReceiptController::class);
    Route::resource('cheque-payment', ChequePaymentController::class);
    Route::put('cheque-process/{status}', [ChequePaymentController::class, 'chequeProcess']);
    Route::put('cheque-payment-edit/{key}', [ChequePaymentController::class, 'update']);
    Route::get('cheque-search/{key}', [ChequePaymentController::class, 'chequeSearch']);
    Route::put('cheque-cancel/{code}', [ChequePaymentController::class, 'chequeCancel']);


    //---------------------END---------------------------------------------------

    //-------------------Payment Receipt Controller-----------------------------------------
    Route::resource('payment-receipt', PaymentReceiptController::class);
    Route::put('payment-receipt-reversal', [PaymentReceiptController::class, 'reversal']);
    //Route::resource('bank-transfer-payment-receipt', BankPaymentReceiptController::class);
    //Route::resource('card-payment-receipt', CardPaymentReceiptController::class);
    Route::resource('cheque-payment-receipt', CustomerChequeReturnReceiptController::class);
    Route::get('return-cheques-customer/{key}', [CustomerChequeReturnReceiptController::class, 'returnChequesForCustomer']);
    Route::put('cheque-return-receipt-reversal', [CustomerChequeReturnReceiptController::class, 'reversal']);



    //---------------------END---------------------------------------------------

    //-------------------Payment Voucher(Supplier) Controller-----------------------------------------
    Route::resource('payment-voucher', PaymentVoucherController::class);
    Route::put('payment-voucher-reversal', [PaymentVoucherController::class, 'reversal']);
    Route::resource('voucher-bank-payment', SupplierBankPaymentController::class);
    //Route::resource('voucher-bill-payment', SupplierGrnPaymentController::class);
    Route::resource('voucher-card-payment', SupplierCardPaymentController::class);
    Route::resource('voucher-cheque-payment', SupplierChequePaymentController::class);
    Route::put('supplier-cheque-process/{status}', [SupplierChequePaymentController::class, 'chequeProcess']);
    Route::resource('supplier-cheque-payment', SupplierChequePaymentController::class);
    Route::put('supplier-cheque-cancel/{code}', [SupplierChequePaymentController::class, 'chequeCancel']);
    Route::get('supplier-cheque-search/{key}', [SupplierChequePaymentController::class, 'show']);


    //---------------------END---------------------------------------------------

    //---------------------- Vehicle Controller---------------------------------------

    //Route::resource('service-master', ServiceMasterController::class);
    Route::resource('service-package', ServicePackageController::class);
    Route::get('service-package-search/{key}', [ServicePackageController::class, 'searchServicePackage']);
    Route::resource('vehicle-master', VehicleMasterController::class);
    Route::get('vehicle-master-search/{key}', [VehicleMasterController::class, 'searchVehicleMaster']);
    //---------------------------END -------------------------------------------------


    //---------------------- Vehicle Brand Controller---------------------------------------
    Route::get('vehicle-brand-search/{key}', [VehicleBrandController::class, 'searchVehicleBrand']);

    //---------------------------END -------------------------------------------------
    //---------------------- Vehicle Type Controller---------------------------------------
    Route::get('vehicle-type-search/{key}', [VehicleTypeController::class, 'searchVehicleType']);

    //---------------------------END -------------------------------------------------


    //-------------------------Reports Controllers------------------------------------

    Route::get('sales-report', [SalesReportController::class, 'salesReport']);
    Route::get('details-sales', [SalesReportController::class, 'detailsSalesReport']);
    Route::get('monthly-sales', [SalesReportController::class, 'monthlySales']);
    Route::get('daily-sales-return', [SalesReportController::class, 'dailySalesReturn']);


    Route::get('customer-list', [CustomerReportController::class, 'customerList']);
    Route::get('customer-summary', [CustomerReportController::class, 'customerSummary']);
    Route::get('customer-summary-without-modes', [CustomerReportController::class, 'customerSummaryWithoutModeOfPayments']);
    Route::get('credit-statement', [CustomerReportController::class, 'creditStatement']);
    Route::get('credit-statement-by-rep', [CustomerReportController::class, 'creditStatementByRep']);
    Route::get('credit-statement-by-route', [CustomerReportController::class, 'creditStatementByRoute']);
    Route::get('customer-credit', [CustomerReportController::class, 'getCustomerCredit']);
    Route::get('customer-aging', [CustomerReportController::class, 'customerAgingSummary']);

    Route::get('daily-summary', [SummaryReportController::class, 'dailySummary']);
    Route::get('summary', [SummaryReportController::class, 'periodicSummary']);
    Route::get('day-end-summary', [SummaryReportController::class, 'dayEndSummary']);
    Route::get('monthly-summary', [SummaryReportController::class, 'monthlySummary']);
    Route::get('day-book-summary', [SummaryReportController::class, 'dayBookByCashAndChequeSummary']);
    Route::get('day-book-summary', [SummaryReportController::class, 'dayBookByCashAndChequeSummary']);


    Route::get('stock-in-hand', [StockReportController::class, 'stockInHand']);
    Route::get('stock-audit', [StockReportController::class, 'stockAudit']);
    Route::get('stock-summary', [StockReportController::class, 'stockSummary']);
    Route::get('item-in-stock', [StockReportController::class, 'itemInStock']);
    Route::get('periodic-stock', [StockReportController::class, 'periodicStock']);
    Route::get('stock-issue-report', [StockReportController::class, 'stockIssue']);

    Route::get('periodic-expenses', [ExpenseReportController::class, 'periodicExpenses']);
    Route::get('monthly-expenses', [ExpenseReportController::class, 'monthlyExpenses']);

    Route::get('supplier-list', [SupplierReportController::class, 'supplierList']);
    Route::get('debit-statement', [SupplierReportController::class, 'debitStatement']);
    Route::get('supplier-debit', [SupplierReportController::class, 'getSupplierDebit']);
    Route::get('supplier-summary', [SupplierReportController::class, 'supplierSummary']);
    // Route::get('monthly-purchase', [SupplierReportController::class, 'monthlyPurchase']);
    //Route::get('purchase-history', [SupplierReportController::class, 'purchaseHistory']);

    Route::get('purchase-list', [PurchaseReportController::class, 'purchaseList']);
    Route::get('daily-purchase', [PurchaseReportController::class, 'dailyPurchases']);
    Route::get('details-purchase', [PurchaseReportController::class, 'detailsPurchases']);
    Route::get('monthly-purchase', [PurchaseReportController::class, 'monthlyPurchases']);

    Route::get('receipt-cheque-by-customer/{key}', [ChequeReceiptReportController::class, 'chequeByCustomer']);
    Route::get('receipt-periodic-cheque', [ChequeReceiptReportController::class, 'periodicCheque']);
    Route::get('receipt-cheque-in-hand', [ChequeReceiptReportController::class, 'chequeInHand']);
    Route::get('receipt-cheque-in-progress', [ChequeReceiptReportController::class, 'chequeInProgress']);    
    Route::get('receipt-cheque-in-realized', [ChequeReceiptReportController::class, 'chequeInRealized']);
    Route::get('receipt-cheque-returned', [ChequeReceiptReportController::class, 'chequeRetured']);

    Route::get('voucher-cheque-by-supplier', [ChequeVoucherReportController::class, 'chequeBySupplier']);
    Route::get('voucher-periodic-cheque', [ChequeVoucherReportController::class, 'periodicCheque']);

    Route::get('daily-payment-receipt', [PaymentReceiptReportController::class, 'dailyPaymentReceipt']);
    Route::get('daily-payment-receipt-by-rep/{key}', [PaymentReceiptReportController::class, 'dailyPaymentReceiptByRep']);
    Route::get('daily-payment-receipt-by-route/{key}', [PaymentReceiptReportController::class, 'dailyPaymentReceiptByRoute']);
    Route::get('daily-payment-receipt-by-location/{key}', [PaymentReceiptReportController::class, 'dailyPaymentReceiptByLocation']);


    //--------------------------Report Location Based Controller-------------------------------
    Route::get('sales-location-report', [SalesLocationReportController::class, 'salesLocationReport']);
    Route::get('sales-return-location', [SalesLocationReportController::class, 'dailySalesReturnLocationBased']);
    Route::get('details-sales-location', [SalesLocationReportController::class, 'detailsSalesReportLocationBased']);
    Route::get('monthly-sales-location', [SalesLocationReportController::class, 'monthlySalesLocationBased']);
    Route::get('consign-batch', [SalesLocationReportController::class, 'consignBatch']);
    Route::get('series-based-invoices', [SalesLocationReportController::class, 'seriesBasedInvoices']);
    Route::get('items-sales-by-customer', [SalesLocationReportController::class, 'itemsSalesByCustomer']);
    Route::get('customer-sales-reconciliation', [SalesLocationReportController::class, 'customerSalesReconciliation']);



    Route::get('daily-payment-location-receipt', [PaymentReceiptLocationReportController::class, 'dailyPaymentReceiptLocationBased']);
    Route::get('daily-payment-receipt-location-by-payment-type', [PaymentReceiptLocationReportController::class, 'dailyPaymentReceiptLocationBasedByPaymentType']);
	Route::get('daily-sales-with-payment', [PaymentReceiptLocationReportController::class, 'DailySalesWithPayment']);

    Route::get('daily-payment-location-voucher', [PaymentVoucherLocationReportController::class, 'dailyPaymentVoucherLocationBased']);
    Route::get('daily-payment-Voucher-location-by-payment-type', [PaymentVoucherLocationReportController::class, 'dailyPaymentVoucherLocationBasedByPaymentType']);


    Route::get('daily-location-purchase', [PurchaseLocationReportController::class, 'dailyLocationPurchases']);
    Route::get('details-location-purchase', [PurchaseLocationReportController::class, 'detailsPurchasesLocationBased']);
    Route::get('monthly-location-purchase', [PurchaseLocationReportController::class, 'monthlyPurchasesLocationBased']);

    Route::get('stock-issue-location', [StockLocationReportController::class, 'stockIssueByLocation']);
    Route::get('stock-transfer-location', [StockLocationReportController::class, 'stockTransferByLocation']);
    Route::get('item-in-stock-by-location', [StockLocationReportController::class, 'itemInStockByLocation']);
    Route::get('stock-in-hand-total-by-location', [StockLocationReportController::class, 'stockInHandTotalByLocation']);
    Route::get('stock-dashboard', [StockLocationReportController::class, 'stockDashboard']);
    Route::get('stock-dashboard-category', [StockLocationReportController::class, 'stockDashboardCategory']);
    
    Route::get('daily-expenses-location', [ExpenseLocationReportController::class, 'dailyExpensesLocationBased']);
    Route::get('monthly-expenses-location', [ExpenseLocationReportController::class, 'monthlyExpensesLocationBased']);


});

//---------------------------END -------------------------------------------------





// Route::put('updateCust/{id}',[CustomerController::class,'cutomerUpdate']);
