<?php

/*
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow\Monitoring;

use OpenCodeModeling\CodeGenerator\Workflow\Description;
use OpenCodeModeling\CodeGenerator\Workflow\DescriptionWithInputSlot;
use OpenCodeModeling\CodeGenerator\Workflow\DescriptionWithOutputSlot;
use Psr\Log\LoggerInterface;

final class LoggerMonitor implements Monitoring
{
    /**
     * @var LoggerInterface
     **/
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function start(Description $description): void
    {
        $this->logger->info('Start: ' . $description->description());
    }

    public function call(Description $description): void
    {
        if ($description instanceof DescriptionWithInputSlot) {
            $this->logger->info(
                \sprintf('|-- Executing with input slots "%s"', \implode('", "', $description->inputSlots())),
            );
        } else {
            $this->logger->info('|-- Executing without input slots');
        }
    }

    public function done(Description $description): void
    {
        if ($description instanceof DescriptionWithOutputSlot) {
            $this->logger->info(\sprintf('|-- Done! Output stored in slot "%s"', $description->outputSlot()));
        } else {
            $this->logger->info('|-- Done!');
        }
    }

    public function error(Description $description, \Throwable $e): void
    {
        $this->logger->error(
            \sprintf('Error on "%s"! Reason: %s, File: %s, Line: %d',
                $description->description(),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            ),
            [
                'exception' => $e,
            ]
        );
    }
}
