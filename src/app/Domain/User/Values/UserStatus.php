<?php

namespace App\Domain\User\Values;

use MyCLabs\Enum\Enum;

/**
 * Value Object
 * used by myclabs/php-enum
 * https://github.com/myclabs/php-enum
 */
final class UserStatus extends Enum
{
    private const ACTIVE = 'ACTIVE';
    private const INACTIVE = 'INACTIVE';
}
