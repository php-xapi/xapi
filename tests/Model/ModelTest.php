<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Tests\Model;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Xabbuh\XApiCommon\Serializer\Event\ActorEventSubscriber;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class ModelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \JMS\Serializer\Serializer
     */
    protected $serializer;

    /**
     * @var \JMS\Serializer\EventDispatcher\EventSubscriberInterface[]
     */
    protected $subscribers = array();

    protected function setUp()
    {
        $this->subscribers[] = new ActorEventSubscriber();
        $subscribers = $this->subscribers;

        $builder = SerializerBuilder::create();
        $builder->configureListeners(
            function (EventDispatcher $dispatcher) use ($subscribers) {
                foreach ($subscribers as $subscriber) {
                    $dispatcher->addSubscriber($subscriber);
                }
            }
        );
        $this->serializer = $builder->build();
    }

    protected function loadFixture($name)
    {
        return file_get_contents(__DIR__.'/fixtures/'.$name.'.json');
    }

    protected function serialize($data)
    {
        return $this->serializer->serialize($data, 'json');
    }

    protected function deserialize($fixture)
    {
        $type = str_replace(array('Tests\\', 'Test'), '', get_class($this));

        return $this->serializer->deserialize($fixture, $type, 'json');
    }

    protected function serializeAndValidateData($expected, $data)
    {
        $actual = $this->serialize($data);
        $this->assertEquals(json_decode($expected), json_decode($actual));
    }
}
