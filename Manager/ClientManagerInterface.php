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
interface ClientManagerInterface
{
    /**
     * Returns the XApiClient referenced by the given name.
     *
     * @param string $name The internal name
     *
     * @return \Xabbuh\XApi\Client\XApiClientInterface The client
     */
    public function getClient($name);
}
