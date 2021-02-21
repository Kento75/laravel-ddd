<?php

namespace App\Domain\Values;

use MyCLabs\Enum\Enum;

/**
 * Value Object
 * used by myclabs/php-enum
 * https://github.com/myclabs/php-enum
 */
final class TaskStatus extends Enum
{
    private const UNDONE = 'UNDONE';
    private const DONE = 'DONE';
}
