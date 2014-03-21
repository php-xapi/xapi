<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer;

use Xabbuh\XApi\Common\Serializer\Serializer;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class SerializerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetMetadataDirectory()
    {
        $dir = Serializer::getMetadataDirectory();

        $this->assertEquals(realpath($dir), realpath(__DIR__.'/../../metadata/serializer'));
    }

    public function testRegisterXApiMetadata()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('addMetadataDir');

        Serializer::registerXApiMetadata($serializerBuilder);
    }

    public function testRegisterXApiEventSubscriber()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('configureListeners');

        Serializer::registerXApiEventSubscriber($serializerBuilder);
    }

    public function testRegisterXApi()
    {
        $serializerBuilder = $this->getMock('\JMS\Serializer\SerializerBuilder');
        $serializerBuilder->expects($this->once())
            ->method('addMetadataDir');
        $serializerBuilder->expects($this->once())
            ->method('configureListeners');

        Serializer::registerXApi($serializerBuilder);
    }
}
