<?php

/*
 * This file is part of the XabbuhXApiClientBundle package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\Manager;

/**
 * XApiClient manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ClientManager implements ClientManagerInterface
{
    /**
     * @var \Xabbuh\XApi\Client\XApiClientInterface[]
     */
    private $clients = array();

    /**
     * @param \Xabbuh\XApi\Client\XApiClientInterface[] $clients
     */
    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    /**
     * {@inheritDoc}
     */
    public function getClient($name)
    {
        if (!isset($this->clients[$name])) {
            throw new \InvalidArgumentException('Client '.$name.' does not exist');
        }

        return $this->clients[$name];
    }
}
