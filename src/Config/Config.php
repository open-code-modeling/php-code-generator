<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use Symfony\Component\Console\Command\Command;

interface Config
{
    /**
     * Optional list of CLI commands to register for Code Generation
     *
     * @return Command[]
     */
    public function consoleCommands(): iterable;
}
