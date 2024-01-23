<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MultiPurposeStatus extends Enum
{
    const IN_ACTIVE =   0;
    const ACTIVE =   1;
    const PAYMENT_NOT_DONE =   2;
    const PAYMENT_PARTIAL = 3;
    const PAYMENT_COMPLETED = 4;  
    const REVERSED = 5;
    const PENDING = 6;
    const DELIVERY = 7;
    CONST ACCEPT = 8;
    CONST REJECT = 9;
}