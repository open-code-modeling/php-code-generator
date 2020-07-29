<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Exception;

final class WrongSlotType extends RuntimeException
{
    public static function withSlotName(string $slotName, string $expectedType, string $type): self
    {
        return new self(
            \sprintf('Slot name "%s" has not expected type "%s". Type is "%s".', $slotName, $expectedType, $type)
        );
    }
}
