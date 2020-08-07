<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

use OpenCodeModeling\CodeGenerator\Exception\MissingSlotName;
use OpenCodeModeling\CodeGenerator\Exception\WrongSlotType;

final class WorkflowContextMap implements WorkflowContext
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

    public function has(string $slotName): bool
    {
        return isset($this->map[$slotName]);
    }

    public function assertSlot(string $slotName, string $type = null): void
    {
        if (! $this->has($slotName)) {
            throw new MissingSlotName($slotName);
        }
        if ($type !== null) {
            $slot = $this->get($slotName);

            switch ($type) {
                case 'int':
                case 'integer':
                    $isType = \is_int($slot);
                    break;
                case 'string':
                    $isType = \is_string($slot);
                    break;
                case 'bool':
                case 'boolean':
                    $isType = \is_bool($slot);
                    break;
                case 'array':
                    $isType = \is_array($slot);
                    break;
                default:
                    $isType = $slot instanceof $type;
                    break;
            }

            if ($isType === false) {
                throw WrongSlotType::withSlotName($slotName, $type, (\is_object($slot) ? \get_class($slot) : \gettype($slot)));
            }
        }
    }

    /**
     * @return string[]
     */
    public function getSlotNames(): array
    {
        return \array_keys($this->map);
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
