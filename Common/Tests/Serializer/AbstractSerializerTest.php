<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializerBuilder;
use Xabbuh\XApi\Common\Serializer\Event\ActorEventSubscriber;
use Xabbuh\XApi\Common\Serializer\Event\DocumentDataWrapper;
use Xabbuh\XApi\Common\Serializer\Event\ObjectEventSubscriber;
use Xabbuh\XApi\Common\Serializer\Event\SetSerializedTypeEventSubscriber;
use Xabbuh\XApi\Common\Serializer\Handler\DocumentDataUnwrapper;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    protected $serializer;

    protected function setUp()
    {
        $builder = SerializerBuilder::create();
        $builder->addMetadataDir(
            __DIR__.'/../../metadata/serializer',
            'Xabbuh\XApi\Model'
        );
        $builder->configureListeners(
            function (EventDispatcher $dispatcher) {
                $dispatcher->addSubscriber(new ActorEventSubscriber());
                $dispatcher->addSubscriber(new DocumentDataWrapper());
                $dispatcher->addSubscriber(new ObjectEventSubscriber());
                $dispatcher->addSubscriber(new SetSerializedTypeEventSubscriber());
            }
        );
        $builder->configureHandlers(
            function (HandlerRegistryInterface $registry) {
                $registry->registerSubscribingHandler(new DocumentDataUnwrapper());
            }
        );
        $this->serializer = $builder->build();
    }

    protected function assertJsonEquals($expected, $actual)
    {
        $this->assertEquals(json_decode($expected), json_decode($actual));
    }
}
