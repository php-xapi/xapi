<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\ClientBundle\Tests\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Compiler\RegisterClientsPass;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class RegisterClientsPassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RegisterClientsPass
     */
    private $compilerPass;

    /**
     * @var Definition
     */
    private $clientManager;

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private $containerBuilder;

    protected function setUp()
    {
        $this->compilerPass = new RegisterClientsPass();
        $this->clientManager = $this->createClientManagerDefinition();
        $this->containerBuilder = $this->createContainerBuilder($this->clientManager);
    }

    public function testWithoutClients()
    {
        $this->setClientsParameter($this->containerBuilder, array());
        $this->compilerPass->process($this->containerBuilder);

        $this->assertEquals(array(), $this->clientManager->getArgument(0));
    }

    public function testWithOneClient()
    {
        $this->setClientsParameter($this->containerBuilder, array(
                'foo' => 'xabbuh_xapi_client.clients.foo'
        ));
        $this->compilerPass->process($this->containerBuilder);

        $this->assertEquals(
            array('foo' => new Reference('xabbuh_xapi_client.clients.foo')),
            $this->clientManager->getArgument(0)
        );
    }

    public function testWithMultipleClients()
    {
        $this->setClientsParameter($this->containerBuilder, array(
            'foo' => 'xabbuh_xapi_client.clients.foo',
            'bar' => 'xabbuh_xapi_client.clients.bar',
        ));
        $this->compilerPass->process($this->containerBuilder);

        $this->assertEquals(
            array(
                'foo' => new Reference('xabbuh_xapi_client.clients.foo'),
                'bar' => new Reference('xabbuh_xapi_client.clients.bar'),
            ),
            $this->clientManager->getArgument(0)
        );
    }

    private function createClientManagerDefinition()
    {
        return new Definition('\Xabbuh\XApi\ClientBundle\Manager\ClientManager');
    }

    private function createContainerBuilder($clientManager)
    {
        $containerBuilder = $this->getMockBuilder('\Symfony\Component\DependencyInjection\ContainerBuilder')
            ->setMethods(array('getDefinition', 'getParameter'))
            ->getMock();
        $containerBuilder->expects($this->any())
            ->method('getDefinition')
            ->with('xabbuh_xapi_client.client_manager')
            ->will($this->returnValue($clientManager));

        return $containerBuilder;
    }

    private function setClientsParameter($containerBuilder, array $clients)
    {
        $containerBuilder->expects($this->any())
            ->method('getParameter')
            ->with('xabbuh_xapi_client.clients')
            ->will($this->returnValue($clients));
    }
}
