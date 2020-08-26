<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Use this class to describe a component which only has input data.
 */
final class ComponentDescriptionWithInputSlotOnly implements DescriptionWithInputSlot
{
    use InputSlotTrait;
    use DescriptionTrait;

    /**
     * @param callable $workflowComponent The component to be executed
     * @param string ...$inputSlots An ordered list of slot names for the required input data of the component
     */
    public function __construct(
        callable $workflowComponent,
        string ...$inputSlots
    ) {
        $this->component = $workflowComponent;
        $this->inputSlots = $inputSlots;
    }
}
