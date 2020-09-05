<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Implementation of \OpenCodeModeling\CodeGenerator\Workflow\DescriptionWithOutputSlot
 */
trait OutputSlotTrait
{
    /**
     * @var string
     */
    private $outputSlot;

    /**
     * Returns the slot name under which the output data is stored
     *
     * @return string
     */
    public function outputSlot(): string
    {
        return $this->outputSlot;
    }
}
