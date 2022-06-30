<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class RentalStatus extends Enum
{
    const Pending = "pending";
    const Approved = "approved";
    const Rejected = "rejected";
    const Finsihed = "finished";
}
