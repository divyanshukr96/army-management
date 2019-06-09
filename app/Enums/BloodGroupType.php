<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class BloodGroupType extends Enum implements LocalizedEnum
{
    const A = 'A+';
    const A_ = 'A-';
    const B = 'B+';
    const B_ = 'B-';
    const O = 'O+';
    const O_ = 'O-';
    const AB = 'AB+';
    const AB_ = 'AB-';
}
