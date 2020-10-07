<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\Monitoring\Monitoring;
use Symfony\Component\Console\Command\Command;

/**
 * The code generator supports different types of configuration via this interface
 */
interface Config
{
    /**
     * Optional list of CLI commands to register for code generator CLI
     *
     * @return Command[]
     */
    public function consoleCommands(): iterable;

    /**
     * Monitoring instance for the workflow engine
     *
     * @return Monitoring|null
     */
    public function monitor(): ?Monitoring;
}
