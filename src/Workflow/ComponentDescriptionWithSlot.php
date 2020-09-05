<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Use this class to describe a component which has input and output data.
 */
final class ComponentDescriptionWithSlot implements DescriptionWithInputSlot, DescriptionWithOutputSlot
{
    use InputSlotTrait;
    use OutputSlotTrait;
    use DescriptionTrait;

    /**
     * @param callable $workflowComponent The component to be executed
     * @param string $outputSlot Is the slot name under which the output data is stored
     * @param string ...$inputSlots An ordered list of slot names for the required input data of the component
     */
    public function __construct(
        callable $workflowComponent,
        string $outputSlot,
        string ...$inputSlots
    ) {
        $this->component = $workflowComponent;
        $this->outputSlot = $outputSlot;
        $this->inputSlots = $inputSlots;
    }
}
