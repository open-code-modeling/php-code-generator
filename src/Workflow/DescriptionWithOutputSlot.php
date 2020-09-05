<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Implement this interface for describing the output data of a component.
 */
interface DescriptionWithOutputSlot extends Description
{
    /**
     * Returns the slot name under which the output data of the component is stored
     *
     * @return string Slot name under which the data can be retrieved later
     */
    public function outputSlot(): string;
}
