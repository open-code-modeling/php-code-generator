<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Console;

use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContextMap;

final class WorkflowContext extends AbstractHelper
{
    /**
     * @var \OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext
     **/
    private $context;

    public function __construct()
    {
        $this->context = new WorkflowContextMap();
    }

    public function context(): \OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext
    {
        return $this->context;
    }

    public function getName()
    {
        return \OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext::class;
    }
}
