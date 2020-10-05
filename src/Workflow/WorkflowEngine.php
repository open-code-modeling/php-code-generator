<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow;

use OpenCodeModeling\CodeGenerator\Workflow\Monitoring\Monitoring;

/**
 * The class `WorkflowEngine` processes a list of classes in a specified order which implement the `Description`
 * interface. The processing is started by the `run()` method.
 */
final class WorkflowEngine
{
    /**
     * @var Monitoring
     **/
    private $monitoring;

    public function __construct(Monitoring $monitoring)
    {
        $this->monitoring = $monitoring;
    }

    /**
     * Processes a list of classes in a specified order which implement the `Description`
     * interface.
     *
     * @param WorkflowContext $context Stores input / output data of the components
     * @param Description ...$descriptions Component descriptions
     */
    public function run(WorkflowContext $context, Description ...$descriptions): void
    {
        foreach ($descriptions as $description) {
            try {
                $this->monitoring->start($description);
                $component = $description->component();
                $this->monitoring->call($description);

                if ($description instanceof DescriptionWithInputSlot) {
                    $result = $component(...$context->getByDescription($description));
                } else {
                    $result = $component();
                }

                if ($description instanceof DescriptionWithOutputSlot) {
                    $context->put($description->outputSlot(), $result);
                }
                $this->monitoring->done($description);
            } catch (\Throwable $e) {
                $this->monitoring->error($description, $e);
                break;
            }
        }
    }
}
