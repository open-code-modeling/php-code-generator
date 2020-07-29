<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

final class ComponentDescriptionWithInputSlotOnly implements DescriptionWithInputSlot
{
    use InputSlotTrait;
    use DescriptionTrait;

    public function __construct(
        callable $workflowComponent,
        string ...$inputSlots
    ) {
        $this->component = $workflowComponent;
        $this->inputSlots = $inputSlots;
    }
}
