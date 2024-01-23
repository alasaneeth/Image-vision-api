<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

final class TransactionCode extends Enum
{
    //------------------------------------------CUSTOMER
    
    const CUSTOMER_CODE = 200;
    const CUSTOMER_TYPE_CODE = 201;
    const CUSTOMER_CONTACT_CODE = 202;

    //-----------------------------------------------ITEM
    
    const ITEM_CATEGORY_CODE = 203;
    const ITEM_SUB_CATEGORY_CODE = 204;
    const ITEM_BRAND_CODE = 205;
    const ITEM_UNIT_CODE = 206;
    const PARCEL_IMAGE_CODE = 207;
    const ITEM_BIN_LOCATION_CODE = 208;
    const ITEM_COLOR_CODE = 209;
    const PARCEL_CODE = 210;
    const ITEM_PRICE = 310;

    //-----------------------------------------SUPPLIER
    
    const SUPPLIER = 211;

    //------------------------------------------GRN
    
    const GRN = 212;
    const PURCHASE_RETURN = 320;
    const STOCK_IN = 412;

    //------------------------------------------INVOICE
    
    const BILL_PAYMENT_CODE = 304;
    const INVOICE_PAYMENT_CODE = 305;
    const BILL_SOURCE_CODE = 213;
    const INVOICE_CODE = 214;
    const INVOICE_DATA = 301;
    const SALES_RETURN_CODE = 302;
    const INVOICE_EXT_CODE = 234;
    const SERIES_CODE = 235;
    const BATCH_CODE = 236;


    //------------------------Day End
    const GENERAL_LEDGER_CODE = 328;
    const CLOSING_BALANCE_CODE = 329;



    //------------------------------------------Stock
   
    const STOCK_LOCATION = 215;
    const STOCK_HISTORY = 216;
    const COURIER = 217;
    const ROUTE = 218;
    const STOCK = 219;

    const STOCK_HISTORY_EXT = 223;
    const MATURE_STOCK = 224;
    const STOCK_HISTORY_TEMP = 225;
  
    //----------------------------------------Bank
    
    const BANK_CODE = 220;
    const BANK_BRANCH_CODE = 221;

    //------------------------------------------Payment Receipt

    const PAYMENT_RECEIPT_CODE = 222;

    //------------------------------------------Expenses

    const EXPENSES_TYPE_CODE = 226;
    const EXPENSES_CATEGORY = 227;
    const EXPENSES = 228;
    const EXPENSES_PAYMENT = 229;

    //------------------------------------------User Type

    const USER_TYPE_CODE = 230;
    const USER_CODE = 231;
    const USER_SETTING = 232;
    const SETTING = 233;

    //------------------------------------------System Menu Action
    
    const MENU_ACTION = 300;

    //--------------------------------------Cheque Return

    const CHEQUE_RETURN_PAYMENT_RECEIPT_CODE = 321;
    const CHEQUE_RETURN_CASH_PAYMENT_CODE = 322;
    const CHEQUE_RETURN_CARD_PAYMENT_CODE = 323;
    const CHEQUE_RETURN_BANK_PAYMENT_CODE = 324;
    const CHEQUE_RETURN_CHEQUE_PAYMENT_CODE = 325;
    const CHEQUE_PAYMENT_CUSTOMER_CHEQUE_RECEIPT_CODE = 326;
    const CHEQUE_RETURN_MODE_OF_PAYMENT_CODE = 327;
    const CHEQUE_RETURN_ONLINE_TRANSFER_PAYMENT_CODE = 329;

    //------------------------------------------Payment

    const PAYMENT_MASTER = 310;
    const MODE_OF_PAYMENT = 311;
    const CASH_PAYMENT_CODE = 312;
    const CARD_PAYMENT_CODE = 313;
    const BANK_PAYMENT_CODE = 314;
    const CHEQUE_PAYMENT_CODE = 315;
    const PAYMENT_TYPE_CODE = 316;
    const OVER_PAYMENT_CODE = 317;
    const RETURN_AMOUNT_CODE = 318;
    const ONLINE_TRANSFER_PAYMENT_CODE = 319;
    
    const EXPENSE_MODE_OF_PAYMENT_CODE = 320;
    const EXPENSE_CASH_PAYMENT_CODE = 331;
    const EXPENSE_CHEQUE_PAYMENT_CODE = 332;
    const EXPENSE_BANK_PAYMENT_CODE = 333;
    const EXPENSE_CARD_PAYMENT_CODE = 334;
    const EXPENSE_ONLINE_TRANSFER_PAYMENT_CODE = 335;



    //-----------------------------------------------Vehicle Master

    const VEHICLE_BRAND = 400;
    const VEHICLE_TYPE = 401;
    const VEHICLE_MASTER = 402;
    const SERVICE_PACKAGE = 403;
    const SERVICE_PACKAGE_DATA = 404;
    const SERVICE_MASTER = 405;

    //-----------------------------------------------Sales Code

    const SALES_ORDER = 450;
    const SALES_ORDER_DATA = 451;

    const SALES_QUOTATION = 452;
    const SALES_QUOTATION_DATA = 453;

    const STOCK_TRANSFER = 454;
    const STOCK_ISSUE = 455;
    const STOCK_ISSUE_TYPE = 456;
    const DEPARTMENT = 457;

    const ACCOUNT_TRANSACTION = 458;
    const ACCOUNT_TRANSACTION_TYPE = 459;
    const TRANSACTION_TYPE = 460;
    const LEDGER_TYPE = 460;
const JOURNAL_TYPE_CODE = 461;

    //------------------------------------------Payment Voucher (Supplier)

    const PAYMENT_VOUCHER_CODE = 510;

    const PAYMENT_SUPPLIER_CASH_PAYMENT_CODE = 520;
    const PAYMENT_SUPPLIER_CARD_PAYMENT_CODE = 530;
    const PAYMENT_SUPPLIER_BANK_PAYMENT_CODE = 540;
    const PAYMENT_SUPPLIER_CHEQUE_PAYMENT_CODE = 550;
    const PAYMENT_SUPPLIER_MODE_OF_PAYMENT = 560;
    const PAYMENT_GRN_PAYMENT_VOUCHER_CODE = 570;
    const PAYMENT_SUPPLIER_OVER_PAYMENT_CODE = 580;
    const PAYMENT_SUPPLIER_RETURN_AMOUNT_CODE = 590;
    const SUPPLIER_ONLINE_TRANSFER_AMOUNT_CODE = 600;


}
