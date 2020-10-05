<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Console;

use OpenCodeModeling\CodeGenerator\Config;
use OpenCodeModeling\CodeGenerator\Config\WorkflowConfig;
use OpenCodeModeling\CodeGenerator\Console;
use OpenCodeModeling\CodeGenerator\Exception\RuntimeException;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowContext;
use OpenCodeModeling\CodeGenerator\Workflow\WorkflowEngine;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * CLI command to start code generation
 */
final class WorkflowCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('ocmcg:workflow:run')
            ->setDescription('Executes workflow from configuration file to generate code');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var WorkflowContext $workflowContext */
        $workflowContext = $this->getHelper(Console\WorkflowContext::class)->context();

        $config = $this->loadConfig($workflowContext);

        if ($config instanceof Config\WorkflowConfig) {
            $this->executeWorkflow($config, $workflowContext);
        } elseif ($config instanceof Config\WorkflowCollection) {
            foreach ($config as $workflowConfig) {
                $this->executeWorkflow($workflowConfig, $workflowContext);
            }
        } else {
            throw new RuntimeException(
                \sprintf(
                    '$config must implement %s or %s', Config\WorkflowConfig::class,
                    Config\WorkflowCollection::class
                )
            );
        }

        return 0;
    }

    private function loadConfig(WorkflowContext $workflowContext): Config\Config
    {
        return $this->getHelper(Console\Config::class)->resolver()->resolve($workflowContext);
    }

    private function executeWorkflow(WorkflowConfig $config, WorkflowContext $workflowContext): void
    {
        $workflowEngine = new WorkflowEngine();
        $workflowEngine->run($workflowContext, ...$config->componentDescriptions());
    }
}
