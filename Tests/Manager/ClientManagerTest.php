<?php

/*
 * This file is part of the XabbuhXApiClientBundle package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\ClientBundle\Tests\Manager;

use Xabbuh\XApi\ClientBundle\Manager\ClientManager;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ClientManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testGetClient()
    {
        $client = $this->createClientMock();
        $manager = $this->createManager(array('foo' => $client));

        $this->assertSame($client, $manager->getClient('foo'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetClientWithoutRegisteredClients()
    {
        $client = $this->createClientMock();
        $manager = $this->createManager(array('foo' => $client));
        $manager->getClient('bar');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGetClientWithNonExistingClient()
    {
        $manager = $this->createManager(array());
        $manager->getClient('bar');
    }

    private function createManager(array $clients)
    {
        return new ClientManager($clients);
    }

    private function createClientMock()
    {
        return $this->getMockBuilder('\Xabbuh\XApi\Client\XApiClient')
            ->disableOriginalConstructor()
            ->getMock();
    }
}
