<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Serializer\Event;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;

/**
 * Event listener modifying {@link \Xabbuh\XApiCommon\Model\Actor} data during
 * the serialization and deserialization process.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ObjectEventSubscriber implements EventSubscriberInterface
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
     * for {@link \Xabbuh\XApiCommon\Model\Object} instances.
     *
     * @param PreDeserializeEvent $event The event being handled
     */
    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $type = $event->getType();

        if ('Xabbuh\XApiCommon\Model\Object' === $type['name']) {
            $data = $event->getData();

            if (!isset($data['objectType'])) {
                $data['objectType'] = 'Activity';
            }

            $event->setData($data);
        }
    }
}
