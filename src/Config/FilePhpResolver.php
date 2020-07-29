<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext;

final class FilePhpResolver implements Resolver
{
    /**
     * @var string
     **/
    private $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    public function resolve(WorkflowContext $workflowContext): Config
    {
        return require $this->file;
    }
}
