<?php

/**
 * @see       https://github.com/open-code-modeling/php-code-generator for the canonical source repository
 * @copyright https://github.com/open-code-modeling/php-code-generator/blob/master/COPYRIGHT.md
 * @license   https://github.com/open-code-modeling/php-code-generator/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace OpenCodeModeling\CodeGenerator\Code;

interface ClassInfo
{
    public function getPackagePrefix(): string;

    public function getSourceFolder(): string;

    /**
     * Class namespace is determined by package prefix, source folder and given path.
     *
     * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md#3-examples
     *
     * @param string $path
     * @return string
     */
    public function getClassNamespaceFromPath(string $path): string;

    public function getFullyQualifiedClassNameFromFilename(string $filename): string;

    public function getClassNamespace(string $fcqn): string;

    /**
     * Extracts class name from FQCN
     *
     * @param string $fqcn Full class qualified name
     * @return string Class name
     */
    public function getClassName(string $fqcn): string;

    /**
     * Path is extracted from class name by using package prefix and source folder
     *
     * @param string $fqcn
     * @return string
     */
    public function getPath(string $fqcn): string;

    /**
     * Returns path to file with source folder
     *
     * @param string $path Path without source folder
     * @param string $name Class name
     * @return string
     */
    public function getFilenameFromPathAndName(string $path, string $name): string;

    public function getPathAndNameFromFilename(string $filename): array;

    public function isValidPath(string $filenameOrPath): bool;
}
