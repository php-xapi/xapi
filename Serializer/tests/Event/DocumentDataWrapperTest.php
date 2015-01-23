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

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Xabbuh\XApi\Serializer\Event\DocumentDataWrapper;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentDataWrapperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DocumentDataWrapper
     */
    private $eventSubscriber;

    protected function setUp()
    {
        $this->eventSubscriber = new DocumentDataWrapper();
    }

    public function testWrapData()
    {
        $context = new DeserializationContext();
        $data = array('x' => 'foo', 'y' => 'bar');
        $type = array(
            'name' => 'Xabbuh\XApi\Model\DocumentData',
            'params' => array(),
        );
        $event = new PreDeserializeEvent($context, $data, $type);
        $this->eventSubscriber->wrapData($event);

        $this->assertSame(array('data' => array('x' => 'foo', 'y' => 'bar')), $event->getData());
    }
}
