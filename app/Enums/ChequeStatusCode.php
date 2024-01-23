<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

final class ChequeStatusCode extends Enum
{
    const CHEQUE_IN_HAND = 6;
    const CHEQUE_IN_PROCESS= 7;
    const CHEQUE_RETURNED= 8;
    const CHEQUE_DEPOSITED = 9;
    const RETURNED_CHEQUE_SETTLED = 10;
    const CHEQUE_REALIZED = 11;
    const RETURNED_CHEQUE_SETTLED_REVERSED = 12;

}