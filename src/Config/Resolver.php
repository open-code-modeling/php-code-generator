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
 * Read the configuration from different sources
 */
interface Resolver
{
    /**
     * Returns the configuration for code generation
     *
     * @param WorkflowContext $workflowContext Can be used by the respective configuration to provide necessary data for starting the code generation
     * @return Config
     */
    public function resolve(WorkflowContext $workflowContext): Config;
}
