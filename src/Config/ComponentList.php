<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

class ComponentList implements ComponentCollection
{
    private $position = 0;

    /**
     * @var Component[]
     **/
    private $config;

    public function __construct(Component ...$config)
    {
        $this->config = $config;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->config[$this->position];
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
        return isset($this->config[$this->position]);
    }
}