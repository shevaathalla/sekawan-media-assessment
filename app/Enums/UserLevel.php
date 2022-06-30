<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserLevel extends Enum
{
    const Admin =  "admin";
    const BranchManager =   "branch_manager";
    const RegionManager =  "region_manager";
}
