<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SystemCode extends Enum
{
    const BIZ_X_POS =   1000;

    // Main categories
    const DASHBOARD = 1001;
    const SALES = 1002;
    const VEHICLE = 1003;

    //Sub Categories MainCategory + 1
    //SALES
    const PAYMENT = 10021;

    //VEHICLE
    const VEHICLE_MASTER = 10031;
    const SERVICE_PACKAGES = 10032;
    const UPCOMING_SERVICE = 10033;
}
