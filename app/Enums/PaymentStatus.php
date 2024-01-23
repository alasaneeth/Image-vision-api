<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentStatus extends Enum
{
    const PAYMENT_NOT_DONE =   1;
    const PAYMENT_PARTIAL = 2;
    const PAYMENT_COMPLETED = 3;
    const PAYMENT_GIVING_TO_CUSTOMER = 4; // via sales retrun cash pay check box

}