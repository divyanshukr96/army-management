<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class OtherLeaveType extends Enum implements LocalizedEnum
{
    const MH = 'MH';
    const T_DUTY = 'T_DUTY';
}
