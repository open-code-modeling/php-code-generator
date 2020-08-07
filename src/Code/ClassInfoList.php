<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Code;

final class ClassInfoList
{
    /**
     * @var ClassInfo[]
     **/
    private $list = [];

    public function __construct(ClassInfo ...$classInfo)
    {
        $this->addClassInfo(...$classInfo);
    }

    public function addClassInfo(ClassInfo ...$classInfo): void
    {
        foreach ($classInfo as $item) {
            $this->list[$item->getPackagePrefix()] = $item;
        }
    }

    public function classInfoForPath(string $path): ClassInfo
    {
        foreach ($this->list as $classInfo) {
            if (0 === \strpos($path, $classInfo->getSourceFolder())) {
                return $classInfo;
            }
        }
        throw new \RuntimeException(
            \sprintf('No class info found for path "%s". Check your namespace configuration.', $path)
        );
    }

    public function classInfoForFilename(string $filename): ClassInfo
    {
        foreach ($this->list as $classInfo) {
            if ($classInfo->isValidPath($filename)) {
                return $classInfo;
            }
        }
        throw new \RuntimeException(
            \sprintf('No class info found for filename "%s". Check your namespace configuration.', $filename)
        );
    }
}
