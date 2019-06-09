<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RelationType extends Enum
{
    const Father = 'Father';
    const Mother = 'Mother';
    const Wife = 'Wife';
    const Children = 'Children';
    const Husband = 'Husband';
}
