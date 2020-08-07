<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

final class WorkflowEngine
{
    /**
     * Iterates over given component descriptions and
     *
     * @param WorkflowContext $context
     * @param Description ...$descriptions
     */
    public function run(WorkflowContext $context, Description ...$descriptions): void
    {
        foreach ($descriptions as $description) {
            $component = $description->component();

            if ($description instanceof DescriptionWithInputSlot) {
                $result = $component(...$context->getByDescription($description));
            } else {
                $result = $component();
            }

            if ($description instanceof DescriptionWithOutputSlot) {
                $context->put($description->outputSlot(), $result);
            }
        }
    }
}
