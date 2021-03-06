<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use Symfony\Component\Console\Command\Command;

/**
 * @deprecated Use \OpenCodeModeling\CodeGenerator\Config\WorkflowList
 */
final class ComponentList implements ComponentCollection
{
    private $position = 0;

    /**
     * @var Component[]
     **/
    private $components;

    /**
     * @var Command[]
     **/
    private $consoleCommands = [];

    public function __construct(Component ...$components)
    {
        $this->components = $components;

        foreach ($this->components as $component) {
            $this->addConsoleCommands(...$component->consoleCommands());
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->components[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->components[$this->position]);
    }

    public function consoleCommands(): iterable
    {
        return $this->consoleCommands;
    }

    /**
     * @param Command ...$consoleCommands
     */
    public function addConsoleCommands(Command ...$consoleCommands): void
    {
        foreach ($consoleCommands as $consoleCommand) {
            $this->consoleCommands[] = $consoleCommand;
        }
    }
}
