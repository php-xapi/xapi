<?php

/*
 * This file is part of the xAPI package.
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
 * Event subscriber adding data to objects being deserialized.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AddDataSubscriber implements EventSubscriberInterface
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

    public function onPreDeserialize(PreDeserializeEvent $event)
    {
        $type = $event->getType();

        if ($this->supportsClass($type['name'])) {
            $data = $event->getData();

            if ($this->isDataModificationNeeded($data)) {
                $data = array_merge($data, $this->getAdditionalData());
            }

            $event->setData($data);
        }
    }

    abstract protected function supportsClass($class);

    abstract protected function isDataModificationNeeded($data);

    abstract protected function getAdditionalData();
}
