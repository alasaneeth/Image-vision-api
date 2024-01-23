<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EntryType extends Enum
{
    const DEBIT =   0;
    const CREDIT =   1;
}
