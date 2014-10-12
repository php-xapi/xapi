<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Tests\Event;

use JMS\Serializer\EventDispatcher\PreSerializeEvent;
use JMS\Serializer\SerializationContext;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Serializer\Event\SetSerializedTypeEventSubscriber;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class SetSerializedTypeEventSubscriberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SetSerializedTypeEventSubscriber
     */
    protected $eventSubscriber;

    protected function setUp()
    {
        $this->eventSubscriber = new SetSerializedTypeEventSubscriber();
    }

    public function testGetSubscribedEvents()
    {
        $this->assertEquals(
            array(
                array(
                    'event' => 'serializer.pre_serialize',
                    'method' => 'onPreSerialize',
                ),
            ),
            $this->eventSubscriber->getSubscribedEvents()
        );
    }

    public function testSetActorTypeWithAgent()
    {
        $type = array(
            'name' => 'Xabbuh\XApi\Model\Actor',
            'params' => array(),
        );
        $object = new Agent();
        $event = new PreSerializeEvent(new SerializationContext(), $object, $type);
        $this->eventSubscriber->onPreSerialize($event);

        $type = $event->getType();
        $this->assertEquals('Xabbuh\XApi\Model\Agent', $type['name']);
    }

    public function testSetObjectTypeWithActivity()
    {
        $type = array(
            'name' => 'Xabbuh\XApi\Model\Object',
            'params' => array(),
        );
        $object = new Activity();
        $event = new PreSerializeEvent(new SerializationContext(), $object, $type);
        $this->eventSubscriber->onPreSerialize($event);

        $type = $event->getType();
        $this->assertEquals('Xabbuh\XApi\Model\Activity', $type['name']);
    }
}
