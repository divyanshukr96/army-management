<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class DocumentType extends Enum implements LocalizedEnum
{
    const Aadhaar = 'Aadhaar Card';
    const Pan = 'Pan Card';
    const Driving = 'Driving Licence';
    const Passport = 'Passport';
}
