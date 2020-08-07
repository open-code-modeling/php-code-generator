<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Console;

use OpenCodeModeling\CodeGenerator\Config\Component;
use OpenCodeModeling\CodeGenerator\Config\ComponentCollection;
use OpenCodeModeling\CodeGenerator\Config\Config;
use OpenCodeModeling\CodeGenerator\Exception\RuntimeException;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowEngine;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class WorkflowCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('ocmcg:workflow:run')
            ->setDescription('Executes workflow from configuration file to generate code');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var WorkflowContext $workflowContext */
        $workflowContext = $this->getHelper(\OpenCodeModeling\CodeGenerator\Console\WorkflowContext::class)->context();

        $config = $this->loadConfig($workflowContext);

        if ($config instanceof Component) {
            $this->executeWorkflow($config, $workflowContext);
        } elseif ($config instanceof ComponentCollection) {
            foreach ($config as $componentConfig) {
                $this->executeWorkflow($componentConfig, $workflowContext);
            }
        } else {
            throw new RuntimeException(
                \sprintf('$config must implement %s or %s', Component::class, ComponentCollection::class)
            );
        }

        return 0;
    }

    private function loadConfig(WorkflowContext $workflowContext): Config
    {
        return $this->getHelper(\OpenCodeModeling\CodeGenerator\Console\Config::class)->resolver()->resolve($workflowContext);
    }

    private function executeWorkflow(Component $config, WorkflowContext $workflowContext): void
    {
        $workflowEngine = new WorkflowEngine();
        $workflowEngine->run($workflowContext, ...$config->componentDescriptions());
    }
}
