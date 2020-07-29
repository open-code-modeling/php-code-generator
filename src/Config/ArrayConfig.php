<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Workflow\Description;

class ArrayConfig implements Component
{
    /**
     * @var Description[]
     **/
    private $config;

    public function __construct(Description ...$config)
    {
        $this->config = $config;
    }

    public function componentDescriptions(): array
    {
        return $this->config;
    }
}
