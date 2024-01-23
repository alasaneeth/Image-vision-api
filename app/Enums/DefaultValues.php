<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DefaultValues extends Enum
{
    const CUSTOMER_CODE = 2001000001;
    const PAGINATION_VALUE = 10;
    const IS_SALES_PAGE = 1;

}