<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\LrsBundle\Listener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;

/**
 * View listener serializing controller results.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractSerializerListener
{
    /**
     * Serializes a controller result and wraps it in a JSON response.
     *
     * @param GetResponseForControllerResultEvent $event The HTTP kernel event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        if (!$this->isControllerResultSupported($event->getControllerResult())) {
            return;
        }

        $response = new Response(
            $this->serializeControllerResult($event->getControllerResult()),
            200,
            array('Content-Type' => 'application/json')
        );
        $event->setResponse($response);
    }

    /**
     * Checks whether the controller result object is supported by a serializer.
     *
     * @param mixed $result The controller result
     *
     * @return bool True if the object is supported, false otherwise
     */
    abstract protected function isControllerResultSupported($result);

    /**
     * Serializes the controller result object.
     *
     * @param mixed $result The controller result to serialize
     *
     * @return string The serialized controller result
     */
    abstract protected function serializeControllerResult($result);
}
