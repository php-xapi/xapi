<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Definition;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Compiler\RegisterSerializerMetadataPass;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class RegisterSerializerMetadataPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RegisterSerializerMetadataPass
     */
    private $compilerPass;

    /**
     * @var Definition
     */
    private $fileLocator;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $containerBuilder;

    protected function setUp()
    {
        $this->compilerPass = new RegisterSerializerMetadataPass();
        $this->fileLocator = $this->createFileLocatorDefinition();
        $this->containerBuilder = $this->createContainerBuilderMock($this->fileLocator);
    }

    public function testSerializerMetadataAreNotRegisteredBeforeProcess()
    {
        $this->compilerPass->process($this->containerBuilder);

        $this->assertArrayHasKey('Xabbuh\XApi\Model', $this->fileLocator->getArgument(0));
    }

    private function createFileLocatorDefinition()
    {
        return new Definition('\Metadata\Driver\FileLocator', array(array()));
    }

    private function createContainerBuilderMock($fileLocator)
    {
        $containerBuilder = $this->getMockBuilder('\Symfony\Component\DependencyInjection\ContainerBuilder')
            ->setMethods(array('findDefinition'))
            ->getMock();
        $containerBuilder->expects($this->any())
            ->method('findDefinition')
            ->with('jms_serializer.metadata.file_locator')
            ->will($this->returnValue($fileLocator));

        return $containerBuilder;
    }
}
