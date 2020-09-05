<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Implementation of \OpenCodeModeling\CodeGenerator\Workflow\DescriptionWithInputSlot
 */
trait InputSlotTrait
{
    /**
     * @var string[]
     */
    private $inputSlots;

    /**
     * Returns an ordered list of slot names for the required input data of the component
     *
     * @return array
     */
    public function inputSlots(): array
    {
        return $this->inputSlots;
    }
}
