<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

use OpenCodeModeling\CodeGenerator\Exception\WrongSlotType;

/**
 * Allows to manage the input and output data of the individual components.
 */
interface WorkflowContext
{
    /**
     * Provides access to the respective slot data
     *
     * @param string $slotName Slot name under which the desired slot data can be found
     * @return mixed
     */
    public function get(string $slotName);

    /**
     * Checks if data is available for given slot name
     *
     * @param string $slotName Slot name under which the desired slot data can be found
     * @return bool
     */
    public function has(string $slotName): bool;

    /**
     * Ensures slot name is available with correct data type.
     *
     * @param string $slotName Slot name under which the desired slot data can be found
     * @param string|null $type Checks slot type if given
     * @throws WrongSlotType
     */
    public function assertSlot(string $slotName, string $type = null): void;

    /**
     * Returns all input data required for calling a component from the WorkflowContext object
     *
     * @param DescriptionWithInputSlot $description Component description
     * @return array
     */
    public function getByDescription(DescriptionWithInputSlot $description): array;

    /**
     * Stores the slot data
     *
     * @param string $slotName Slot name under which the data can be retrieved later
     * @param mixed $slotValue Slot data to be stored
     */
    public function put(string $slotName, $slotValue): void;

    /**
     * Returns all available slot names of the WorkflowContext object
     *
     * @return string[]
     */
    public function getSlotNames(): array;
}
