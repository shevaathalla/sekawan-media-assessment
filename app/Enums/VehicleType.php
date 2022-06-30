<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VehicleType extends Enum
{    
    const PeopleTransport = "people_transport";
    const CargoTransport = "cargo_transport";
}
