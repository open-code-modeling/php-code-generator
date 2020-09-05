<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Console;

use OpenCodeModeling\CodeGenerator\Config\Resolver;

/**
 * Resolves configuration
 */
final class Config extends AbstractHelper
{
    /**
     * @var Resolver
     **/
    private $resolver;

    public function __construct(Resolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function resolver(): Resolver
    {
        return $this->resolver;
    }

    public function getName()
    {
        return Config::class;
    }
}
