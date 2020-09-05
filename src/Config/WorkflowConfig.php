<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\Description;

/**
 * Configuration for a workflow. A workflow can consists of multiple descriptions.
 */
interface WorkflowConfig extends Config
{
    /**
     * Returns the component descriptions.
     *
     * @return Description[]
     */
    public function componentDescriptions(): array;
}
