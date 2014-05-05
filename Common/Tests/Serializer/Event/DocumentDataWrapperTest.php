<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer\Event;

use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\DeserializationContext;
use Xabbuh\XApi\Common\Serializer\Event\DocumentDataWrapper;

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
            'name' => 'Xabbuh\XApi\Common\Model\Document',
            'params' => array(),
        );
        $event = new PreDeserializeEvent($context, $data, $type);
        $this->eventSubscriber->wrapData($event);

        $this->assertEquals(
            array('data' => array('x' => 'foo', 'y' => 'bar')),
            $event->getData()
        );
    }
}
