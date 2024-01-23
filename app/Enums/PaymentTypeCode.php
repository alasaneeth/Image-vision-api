<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PaymentTypeCode extends Enum
{
    const CASH_PAYMENT_CODE =   21910000001;
    const CHEQUE_PAYMENT_CODE = 21910000002;
    const BANK_PAYMENT_CODE =   21910000003;
    const CARD_PAYMENT_CODE =   21910000004;
    const OVER_PAYMENT_CODE =   21910000005;
    const RETURN_AMOUNT_CODE =  21910000006;
    const ONLINE_TRANSFER_PAYMENT_CODE =  21910000007;


}
