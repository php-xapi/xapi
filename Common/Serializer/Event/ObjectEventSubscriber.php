<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Serializer\Event;

/**
 * Event listener modifying {@link \Xabbuh\XApi\Common\Model\Actor} data during
 * the serialization and deserialization process.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ObjectEventSubscriber extends AddDataSubscriber
{
    protected function supportsClass($class)
    {
        return 'Xabbuh\XApi\Common\Model\Object' === $class;
    }

    protected function isDataModificationNeeded($data)
    {
        return !isset($data['objectType']);
    }

    protected function getAdditionalData()
    {
        return array('objectType' => 'Activity');
    }
}
