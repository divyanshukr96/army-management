<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class MaritalStatusType extends Enum
{
    const Single = 'Single';
    const Married = 'Married';
    const  Widowed= 'Widowed';
    const  Divorced= 'Divorced';
    const  Separated= 'Separated';
}
