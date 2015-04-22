<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\LrsBundle\Tests\Listener;

use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Xabbuh\XApi\Bundle\LrsBundle\Listener\AbstractSerializerListener;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractSerializerListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $serializer;

    /**
     * @var AbstractSerializerListener
     */
    protected $listener;

    protected function setUp()
    {
        $this->serializer = $this->createSerializerMock();
        $this->listener = $this->createListener();
    }

    public function testOnKernelView()
    {
        $domainObject = $this->getDomainObject();
        $event = new GetResponseForControllerResultEvent(
            $this->createHttpKernelMock(),
            $this->createRequestMock(),
            HttpKernelInterface::MASTER_REQUEST,
            $domainObject
        );

        $this
            ->serializer
            ->expects($this->once())
            ->method($this->getSerializerMethod())
            ->with($this->equalTo($domainObject))
            ->will($this->returnValue('serialized-domain-object'));

        $this->listener->onKernelView($event);
        $response = $event->getResponse();

        $this->assertInstanceOf('\Symfony\Component\HttpFoundation\Response', $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertEquals('serialized-domain-object', $response->getContent());
    }

    public function testOnKernelViewWithoutDomainObject()
    {
        $event = new GetResponseForControllerResultEvent(
            $this->createHttpKernelMock(),
            $this->createRequestMock(),
            HttpKernelInterface::MASTER_REQUEST,
            new \stdClass()
        );

        $this
            ->serializer
            ->expects($this->never())
            ->method('serializeStatement');

        $this->listener->onKernelView($event);

        $this->assertNull($event->getResponse());
    }

    abstract protected function getDomainObjectClass();

    abstract protected function getSerializerMethod();

    abstract protected function createListener();

    abstract protected function getDomainObject();

    private function createSerializerMock()
    {
        return $this->getMock('\Xabbuh\XApi\Serializer\\'.$this->getDomainObjectClass().'SerializerInterface');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\HttpKernel\HttpKernelInterface
     */
    private function createHttpKernelMock()
    {
        return $this->getMock('\Symfony\Component\HttpKernel\HttpKernelInterface');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\HttpFoundation\Request
     */
    private function createRequestMock()
    {
        return $this->getMock('\Symfony\Component\HttpFoundation\Request');
    }
}
