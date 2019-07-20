<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class LeaveType extends Enum implements LocalizedEnum
{
    const CL = 'Casual Leave';
    const AL = 'Annual Leave';
    const SL = 'Sick Leave';
	//const EL = 'Earned leave'
}
