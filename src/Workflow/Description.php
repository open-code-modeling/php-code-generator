<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

/**
 * Must be implemented by all classes that describe a component for the code generator
 */
interface Description
{
    /**
     * Returns the component. A component can be a function or a class. If a component is defined as a class, it must
     * provide a __invoke() method.
     *
     * @return callable
     */
    public function component(): callable;

    /**
     * A description of the component (purpose, what's generated, transformed, ...)
     *
     * @return string
     */
    public function description(): string;
}
