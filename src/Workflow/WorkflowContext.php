<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

interface WorkflowContext
{
    /**
     * @param string $slotName
     * @return mixed
     */
    public function get(string $slotName);

    public function has(string $slotName): bool;

    /**
     * @param string $slotName
     * @param string|null $type Checks also slot type
     */
    public function assertSlot(string $slotName, string $type = null): void;

    /**
     * Returns input data for given description
     *
     * @param DescriptionWithInputSlot $description
     * @return array
     */
    public function getByDescription(DescriptionWithInputSlot $description): array;

    /**
     * @param string $slotName
     * @param mixed $slotValue
     */
    public function put(string $slotName, $slotValue): void;

    /**
     * @return string[]
     */
    public function getSlotNames(): array;
}
