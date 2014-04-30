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
use JMS\Serializer\EventDispatcher\PreSerializeEvent;

/**
 * Event listener that sets the proper class name for polymorphic objects
 * before they are serialized.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class SetSerializedTypeEventSubscriber implements EventSubscriberInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_serialize',
                'method' => 'onPreSerialize',
            ),
        );
    }

    public function onPreSerialize(PreSerializeEvent $event)
    {
        /** @var object $object */
        $object = $event->getObject();

        if (!is_object($object)) {
            return;
        }

        $type = $event->getType();
        $polymorphicTypes = array(
            'Xabbuh\XApi\Common\Model\Actor',
            'Xabbuh\XApi\Common\Model\Object',
        );

        if (in_array($type['name'], $polymorphicTypes)) {
            $event->setType(get_class($object));
        }
    }
}
