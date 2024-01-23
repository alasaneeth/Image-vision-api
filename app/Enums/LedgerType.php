<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LedgerType extends Enum
{
    const CASH =   4601000001;
    const BANK =   4601000002;
    const CREDIT_CARD = 4601000003;
}
