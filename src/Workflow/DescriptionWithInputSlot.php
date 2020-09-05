<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Implement this interface for the description of required input data for a component
 */
interface DescriptionWithInputSlot extends Description
{
    /**
     * Returns a list with slot names for the required input data when the component is called
     *
     * @return string[]
     */
    public function inputSlots(): array;
}
