<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StockHistorySource extends Enum
{
    const GRN = 1;
    const INVOICE = 2;
    const STOCK_ISSUE = 3;
    const STOCK_TRANSFER_FROM = 4;
    const STOCK_TRANSFER_TO = 5;
    const SALES_RETURN = 6;
    const PURCHASE_RETURN = 7;
    const SALES_ORDER = 8;
    const SALES_QUOTATION = 9;
    const STOCK_IN = 10;

}
