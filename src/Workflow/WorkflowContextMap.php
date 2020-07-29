<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

class WorkflowContextMap implements WorkflowContext
{
    /**
     * @var array
     */
    private $map = [];

    public function get(string $slotName)
    {
        return $this->map[$slotName];
    }

    public function put(string $slotName, $slotValue): void
    {
        $this->map[$slotName] = $slotValue;
    }

    public function getByDescription(DescriptionWithInputSlot $description): array
    {
        $input = [];
        foreach ($description->inputSlots() as $slot) {
            $input[] = $this->get($slot);
        }

        return $input;
    }
}
