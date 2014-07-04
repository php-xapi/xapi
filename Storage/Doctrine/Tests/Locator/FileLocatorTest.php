<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Tests\Locator;

use Xabbuh\XApi\Storage\Doctrine\Locator\FileLocator;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class FileLocatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FileLocator
     */
    private $fileLocator;

    protected function setUp()
    {
        $this->fileLocator = new FileLocator(
            array(
                'Xabbuh\XApi\Storage\Doctrine\A' => __DIR__.'/fixtures/a',
                'Xabbuh\XApi\Storage\Doctrine\B\\' => __DIR__.'/fixtures/b',
            ),
            '.xml'
        );
    }

    public function testFindMappingFile()
    {
        $this->assertEquals(
            __DIR__.'/fixtures/a/Bar.xml',
            $this->fileLocator->findMappingFile('Xabbuh\XApi\Storage\Doctrine\A\Bar')
        );
        $this->assertEquals(
            __DIR__.'/fixtures/a/Foo.xml',
            $this->fileLocator->findMappingFile('Xabbuh\XApi\Storage\Doctrine\A\Foo')
        );
        $this->assertEquals(
            __DIR__.'/fixtures/b/Baz.xml',
            $this->fileLocator->findMappingFile('Xabbuh\XApi\Storage\Doctrine\B\Baz')
        );
    }

    /**
     * @expectedException \Doctrine\Common\Persistence\Mapping\MappingException
     */
    public function testFindMappingFileWithSwappedNamespace()
    {
        $this->fileLocator->findMappingFile('Xabbuh\XApi\Storage\Doctrine\A\Baz');
    }

    /**
     * @expectedException \Doctrine\Common\Persistence\Mapping\MappingException
     */
    public function testFindMappingFileWithoutNamespace()
    {
        $this->fileLocator->findMappingFile('Bar');
    }

    public function testGetAllClassNames()
    {
        $this->assertEquals(
            array(
                'Xabbuh\XApi\Storage\Doctrine\A\Bar',
                'Xabbuh\XApi\Storage\Doctrine\A\Foo',
                'Xabbuh\XApi\Storage\Doctrine\B\Baz',
            ),
            $this->fileLocator->getAllClassNames('')
        );
    }

    public function testGetAllClassNamesWithGlobalBasename()
    {
        $this->assertEquals(
            array(
                'Xabbuh\XApi\Storage\Doctrine\A\Foo',
                'Xabbuh\XApi\Storage\Doctrine\B\Baz',
            ),
            $this->fileLocator->getAllClassNames('Bar.xml')
        );
    }

    public function testGetAllClassNamesWithGlobalBasenameWithoutExtension()
    {
        $this->assertEquals(
            array(
                'Xabbuh\XApi\Storage\Doctrine\A\Foo',
                'Xabbuh\XApi\Storage\Doctrine\B\Baz',
            ),
            $this->fileLocator->getAllClassNames('Bar')
        );
    }

    public function testFileExists()
    {
        $this->assertTrue($this->fileLocator->fileExists('Xabbuh\XApi\Storage\Doctrine\A\Bar'));
        $this->assertTrue($this->fileLocator->fileExists('Xabbuh\XApi\Storage\Doctrine\A\Foo'));
        $this->assertTrue($this->fileLocator->fileExists('Xabbuh\XApi\Storage\Doctrine\B\Baz'));
    }

    public function testFileExistsWithSwappedNamespace()
    {
        $this->assertFalse($this->fileLocator->fileExists('Xabbuh\XApi\Storage\Doctrine\A\Baz'));
    }

    public function testFileExistsWithoutNamespace()
    {
        $this->assertFalse($this->fileLocator->fileExists('Bar'));
    }

    public function testGetPaths()
    {
        $this->assertEquals(
            array(__DIR__.'/fixtures/a', __DIR__.'/fixtures/b'),
            $this->fileLocator->getPaths()
        );
    }

    public function testGetFileExtension()
    {
        $this->assertEquals('.xml', $this->fileLocator->getFileExtension());
    }
}
