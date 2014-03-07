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

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Event listener modifying {@link \Xabbuh\XApi\Common\Model\Actor} data during
 * the serialization and deserialization process.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorEventSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_deserialize',
                'method' => 'onPreDeserialize',
            ),
        );
    }

    /**
     * Listener that is executed before the deserialization process takes place
     * for {@link \Xabbuh\XApi\Common\Model\Actor} objects.
     *
     * @param PreDeserializeEvent $event The event being handled
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $type = $event->getType();

        if ('Xabbuh\XApi\Common\Model\Actor' === $type['name']) {
            $data = $event->getData();

            if (!isset($data['objectType'])) {
                $data['objectType'] = 'Agent';
            }

            $event->setData($data);
        }
    }
}
