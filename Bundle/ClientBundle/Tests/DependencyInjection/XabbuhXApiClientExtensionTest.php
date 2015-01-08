<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\XabbuhXApiClientExtension;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class XabbuhXApiClientExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var XabbuhXApiClientExtension
     */
    private $extension;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $containerBuilder;

    protected function setUp()
    {
        $this->extension = new XabbuhXApiClientExtension();
        $this->containerBuilder = $this->createContainerBuilderMock();
    }

    public function testHasClientManagerDefinition()
    {
        $this->containerBuilder
            ->expects($this->once())
            ->method('setDefinition')
            ->with('xabbuh_xapi_client.client_manager', $this->anything());

        $this->loadConfiguration(array());
    }

    public function testClientsParameterWithoutClients()
    {
        $this->containerBuilder
            ->expects($this->once())
            ->method('setParameter')
            ->with('xabbuh_xapi_client.clients', array());

        $this->loadConfiguration(array());
    }

    public function testClientsParameterWithOneClient()
    {
        $this->containerBuilder
            ->expects($this->once())
            ->method('setParameter')
            ->with(
                'xabbuh_xapi_client.clients',
                array('foo' => 'xabbuh_xapi_client.client.foo')
            );

        $this->loadConfiguration(array(
            'clients' => array(
                'foo' => array(
                    'base_url' => 'http://example.com/xapi',
                ),
            ),
        ));
    }

    public function testClientsParameterWithMultipleClients()
    {
        $this->containerBuilder
            ->expects($this->once())
            ->method('setParameter')
            ->with(
                'xabbuh_xapi_client.clients',
                array(
                    'foo' => 'xabbuh_xapi_client.client.foo',
                    'bar' => 'xabbuh_xapi_client.client.bar',
                )
            );

        $this->loadConfiguration(array(
            'clients' => array(
                'foo' => array(
                    'base_url' => 'http://example.com/xapi',
                ),
                'bar' => array(
                    'base_url' => 'http://example.com/xapi',
                ),
            ),
        ));
    }

    public function testBundleAlias()
    {
        $this->assertEquals('xabbuh_xapi_client', $this->extension->getAlias());
    }

    private function createContainerBuilderMock()
    {
        $containerBuilder = $this->getMockBuilder('\Symfony\Component\DependencyInjection\ContainerBuilder')
            ->setMethods(array('getParameterBag', 'setParameter', 'setDefinition'))
            ->getMock();
        $containerBuilder->expects($this->any())
            ->method('getParameterBag')
            ->will($this->returnValue(new ParameterBag()));

        return $containerBuilder;
    }

    private function loadConfiguration($config)
    {
        $this->extension->load(array($config), $this->containerBuilder);
    }
}
