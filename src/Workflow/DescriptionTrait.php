<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Implementation of \OpenCodeModeling\CodeGenerator\Workflow\Description
 */
trait DescriptionTrait
{
    /**
     * @var callable
     */
    private $component;

    /**
     * Return the component to be executed
     *
     * @return callable
     */
    public function component(): callable
    {
        return $this->component;
    }

    public function description(): string
    {
        return \is_object($this->component) ? \get_class($this->component) : static::class;
    }
}
