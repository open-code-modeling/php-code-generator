<?php

/*
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Workflow\Monitoring;

use OpenCodeModeling\CodeGenerator\Workflow\Description;

final class NullMonitor implements Monitoring
{
    public function start(Description $description): void
    {
    }

    public function call(Description $description): void
    {
    }

    public function done(Description $description): void
    {
    }

    public function error(Description $description, \Throwable $e): void
    {
    }
}
