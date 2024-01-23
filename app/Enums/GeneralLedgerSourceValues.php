<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

 final class GeneralLedgerSourceValues extends Enum
 {
    const PAYMENT_RECEIPT = 1; 
    const CASH_PAYMENT = 2;
    const CHEQUE_PAYMENT = 3;
    const CARD_PAYMENT = 4;
    const BANK_PAYMENT = 5;
    const RETURN_AMOUNT = 6;
    const OVER_PAYMENT = 7;
    const EXPENSE_AMOUNT = 8;
    const PAYMENT_VOUCHER = 9;
    const SUPPLIER_CASH_PAYMENT = 10;
    const SUPPLIER_CHEQUE_PAYMENT = 11;
    const SUPPLIER_CARD_PAYMENT = 12;
    const SUPPLIER_BANK_PAYMENT = 13;
    const PURCHASE_RETURN = 14;
    const SALES_RETURN = 15;
    const ACCOUNT_TRANSACTION = 16;
    const CUSTOMER_CHEQUE_RETURN_CASH_PAYMENT = 17;
    const CUSTOMER_CHEQUE_RETURN_CHEQUE_PAYMENT = 18;
    const CUSTOMER_CHEQUE_RETURN_BANK_PAYMENT = 19;
    const CUSTOMER_CHEQUE_RETURN_CARD_PAYMENT = 20;
    const BROUGHT_FORWARD_CASH_BOOK = 21;
    const BROUGHT_FORWARD_BANK = 22;
    const BROUGHT_FORWARD_CREDIT_CARD = 23;
    const ONLINE_TRANSFER_PAYMENT = 24;
    const SUPPLIER_ONLINE_TRANSFER_PAYMENT = 25;
    const CUSTOMER_CHEQUE_RETURN_ONLINE_PAYMENT = 26;
    const EXPENSE_CASH_PAYMENT = 27;
    const EXPENSE_CHEQUE_PAYMENT = 28;
    const EXPENSE_CARD_PAYMENT = 29;
    const EXPENSE_BANK_PAYMENT = 30;
    const EXPENSE_ONLINE_PAYMENT = 31;

 }