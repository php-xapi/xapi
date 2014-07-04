<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Locator;

use Doctrine\Common\Persistence\Mapping\Driver\FileLocator as BaseFileLocator;
use Doctrine\Common\Persistence\Mapping\MappingException;

/**
 * Doctrine mapping file locator.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class FileLocator implements BaseFileLocator
{
    /**
     * @var array
     */
    private $namespaceDirectories = array();

    /**
     * @var string
     */
    private $fileExtension;

    /**
     * @param array  $namespaceDirectories Mapping of namespaces prefixes to
     *                                     a directory containing the mapping
     *                                     files
     * @param string $fileExtension        The mapping files' extension
     */
    public function __construct(array $namespaceDirectories, $fileExtension)
    {
        foreach ($namespaceDirectories as $namespace => $directory) {
            $this->namespaceDirectories[rtrim($namespace, '\\')] = $directory;
        }

        $this->fileExtension = $fileExtension;
    }

    /**
     * {@inheritDoc}
     */
    public function findMappingFile($className)
    {
        if (strpos($className, '\\') !== false) {
            $classNamespace = substr($className, 0, strrpos($className, '\\'));
            $baseClassName = substr($className, strlen($classNamespace) + 1);
        } else {
            $classNamespace = '';
            $baseClassName = $className;
        }

        if (!isset($this->namespaceDirectories[$classNamespace])) {
            throw MappingException::classNotFoundInNamespaces(
                $className,
                array_keys($this->namespaceDirectories)
            );
        }

        $mappingFile = $this->namespaceDirectories[$classNamespace].'/'.$baseClassName.$this->fileExtension;

        if (is_file($mappingFile)) {
            return $mappingFile;
        } else {
            throw MappingException::mappingFileNotFound($className, $mappingFile);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getAllClassNames($globalBasename)
    {
        $classNames = array();

        foreach ($this->namespaceDirectories as $namespace => $directory) {
            $files = glob($directory.'/*'.$this->fileExtension);

            foreach ($files as $path) {
                $fileName = basename($path);
                $className = rtrim(basename($fileName), $this->fileExtension);

                if ($fileName === $globalBasename || $className === $globalBasename) {
                    continue;
                }

                $classNames[] = rtrim($namespace, '\\').'\\'.$className;
            }
        }

        return $classNames;
    }

    /**
     * {@inheritDoc}
     */
    public function fileExists($className)
    {
        if (strpos($className, '\\') !== false) {
            $classNamespace = substr($className, 0, strrpos($className, '\\'));
            $baseClassName = substr($className, strlen($classNamespace) + 1);
        } else {
            $classNamespace = '';
            $baseClassName = $className;
        }

        if (!isset($this->namespaceDirectories[$classNamespace])) {
            return false;
        }

        return file_exists($this->namespaceDirectories[$classNamespace].'/'.$baseClassName.$this->fileExtension);
    }

    /**
     * {@inheritDoc}
     */
    public function getPaths()
    {
        return array_values($this->namespaceDirectories);
    }

    /**
     * {@inheritDoc}
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }
}
