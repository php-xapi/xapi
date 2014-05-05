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
 * Wraps a JSON encoded xAPI document into a Document instance.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentDataWrapper implements EventSubscriberInterface
{
    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            array(
                'event' => 'serializer.pre_deserialize',
                'method' => 'wrapData',
            ),
        );
    }

    public function wrapData(PreDeserializeEvent $event)
    {
        $type = $event->getType();

        if ('Xabbuh\XApi\Common\Model\Document' === $type['name']) {
            $data = $event->getData();
            $event->setData(array('data' => $data));
        }
    }
}
