<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReturnType extends Enum
{
    const SALES_RETURN_WITH_BILL =   1;
    const SALES_RETURN_WITHOUT_BILL = 2;

    const PURCHASE_RETURN_WITH_BILL =   1;
    const PURCHASE_RETURN_WITHOUT_BILL = 2;

}