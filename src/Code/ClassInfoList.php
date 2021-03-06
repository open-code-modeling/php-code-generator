<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Code;

use OpenCodeModeling\CodeGenerator\Exception\RuntimeException;

/**
 *  Stores a list of objects of type \OpenCodeModeling\CodeGenerator\Code\ClassInfo
 */
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

    /**
     * Adds more ClassInfo instances to the list
     *
     * @param ClassInfo ...$classInfo
     */
    public function addClassInfo(ClassInfo ...$classInfo): void
    {
        foreach ($classInfo as $item) {
            $this->list[$item->getPackagePrefix()] = $item;
        }
    }

    /**
     * Returns the appropriate ClassInfo object based on the provided path.
     *
     * @param string $path Path for which ClassInfo instance should be retrieved
     * @return ClassInfo
     */
    public function classInfoForPath(string $path): ClassInfo
    {
        foreach ($this->list as $classInfo) {
            if (0 === \strpos($path, $classInfo->getSourceFolder())) {
                return $classInfo;
            }
        }
        throw new RuntimeException(
            \sprintf('No class info found for path "%s". Check your namespace configuration.', $path)
        );
    }

    /**
     * Returns the appropriate ClassInfo object based on the provided filename.
     *
     * @param string $filename Filename for which ClassInfo instance should be retrieved
     * @return ClassInfo
     */
    public function classInfoForFilename(string $filename): ClassInfo
    {
        foreach ($this->list as $classInfo) {
            if ($classInfo->isValidPath($filename)) {
                return $classInfo;
            }
        }
        throw new RuntimeException(
            \sprintf('No class info found for filename "%s". Check your namespace configuration.', $filename)
        );
    }
}
