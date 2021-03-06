<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\Description;
use Symfony\Component\Console\Command\Command;

/**
 * @deprecated Use \OpenCodeModeling\CodeGenerator\Config\Workflow
 */
final class ArrayConfig implements Component
{
    /**
     * @var Description[]
     **/
    private $config;

    /**
     * @var Command[]
     **/
    private $consoleCommands = [];

    public function __construct(Description ...$config)
    {
        $this->config = $config;
    }

    public function componentDescriptions(): array
    {
        return $this->config;
    }

    public function consoleCommands(): iterable
    {
        return $this->consoleCommands;
    }

    /**
     * Add console commands which are added to the code generator CLI
     *
     * @param Command ...$consoleCommands
     */
    public function addConsoleCommands(Command ...$consoleCommands): void
    {
        foreach ($consoleCommands as $consoleCommand) {
            $this->consoleCommands[] = $consoleCommand;
        }
    }
}
