<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Tests\Serializer;

use Xabbuh\XApi\Serializer\Serializer;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class SerializerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetMetadataDirectory()
    {
        $dir = Serializer::getMetadataDirectory();

        $this->assertEquals(realpath(__DIR__.'/../metadata'), realpath($dir));
    }

    public function testRegisterXApiMetadata()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('addMetadataDir')
            ->with($this->anything(), 'Xabbuh\XApi\Model');

        Serializer::registerXApiMetadata($serializerBuilder);
    }

    public function testRegisterXApiEventSubscriber()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('configureListeners');

        Serializer::registerXApiEventSubscriber($serializerBuilder);
    }

    public function testRegisterXApiHandler()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('configureHandlers');

        Serializer::registerXApiHandler($serializerBuilder);
    }

    public function testRegisterXApi()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('addMetadataDir');
        $serializerBuilder->expects($this->once())
            ->method('configureListeners');
        $serializerBuilder->expects($this->once())
            ->method('configureHandlers');

        Serializer::registerXApi($serializerBuilder);
    }
}
