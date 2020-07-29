<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Exception;

final class MissingSlotName extends RuntimeException
{
    public static function withSlotName(string $slotName): self
    {
        return new self(
            \sprintf('Missing slot name "%s" in workflow context.', $slotName)
        );
    }
}
