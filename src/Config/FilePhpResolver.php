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
 * A standard implementation of the \OpenCodeModeling\CodeGenerator\Config\Resolver interface
 */
final class FilePhpResolver implements Resolver
{
    /**
     * @var string
     **/
    private $file;

    /**
     * @var Config
     */
    private $resolved;

    /**
     * @param string $file The path to the configuration file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function resolve(WorkflowContext $workflowContext): Config
    {
        if ($this->resolved === null) {
            $this->resolved = require $this->file;
        }

        return $this->resolved;
    }
}
