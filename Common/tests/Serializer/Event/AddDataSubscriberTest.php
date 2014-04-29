<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer\Event;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AddDataSubscriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Xabbuh\XApi\Common\Serializer\Event\AddDataSubscriber
     */
    protected $eventSubscriber;

    public function testGetSubscribedEvents()
    {
        $this->assertEquals(
            array(
                array(
                    'event' => 'serializer.pre_deserialize',
                    'method' => 'onPreDeserialize',
                ),
            ),
            $this->eventSubscriber->getSubscribedEvents()
        );
    }

    /**
     * @dataProvider getEventData
     */
    public function testOnPreDeserialize($type, $rawData, $expectedData)
    {
        $event = new PreDeserializeEvent(
            $this->createDeserelizationContext(),
            $rawData,
            $type
        );
        $this->eventSubscriber->onPreDeserialize($event);

        $this->assertEquals($expectedData, $event->getData());
    }

    abstract public function getEventData();

    /**
     * @return \JMS\Serializer\DeserializationContext
     */
    private function createDeserelizationContext()
    {
        return $this->getMock('\JMS\Serializer\DeserializationContext');
    }
}
