<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Config;

use OpenCodeModeling\CodeGenerator\Code\ClassInfoList;

trait ClassInfoListTrait
{
    /**
     * @var ClassInfoList
     **/
    private $classInfoList;

    public function getClassInfoList(): ClassInfoList
    {
        if (null === $this->classInfoList) {
            $this->classInfoList = new ClassInfoList();
        }

        return $this->classInfoList;
    }

    public function setClassInfoList(ClassInfoList $classInfoList): void
    {
        $this->classInfoList = $classInfoList;
    }
}
