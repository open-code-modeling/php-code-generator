<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext;

/**
 * Empty configuration implementation
 */
final class EmptyResolver implements Resolver
{
    public function resolve(WorkflowContext $workflowContext): Config
    {
        return new Workflow();
    }
}
