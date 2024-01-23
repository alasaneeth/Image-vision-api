<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */

final class FreezeStatus extends Enum
{
    const FREEZED =   1;
    const NON_FREEZED =   0;
}