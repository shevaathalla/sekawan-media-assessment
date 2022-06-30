<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VehicleStatus extends Enum
{
    const Available = "available";
    const Unavailable = "unavailable";
    
}
