<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Event;

/**
 * Event listener modifying {@link \Xabbuh\XApi\Model\Actor} data during
 * the serialization and deserialization process.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorEventSubscriber extends AddDataSubscriber
{
    protected function supportsClass($class)
    {
        return 'Xabbuh\XApi\Model\Actor' === $class;
    }

    protected function isDataModificationNeeded($data)
    {
        return !isset($data['objectType']);
    }

    protected function getAdditionalData()
    {
        return array('objectType' => 'Agent');
    }
}
