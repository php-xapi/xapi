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
use Xabbuh\XApi\Common\Model\StatementInterface;
use Xabbuh\XApi\Common\Serializer\StatementSerializerInterface;

/**
 * Kernel event listener transforming statements into proper JSON responses.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementSerializerListener
{
    /**
     * @var \Xabbuh\XApi\Common\Serializer\StatementSerializerInterface
     */
    private $serializer;

    public function __construct(StatementSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Serializes a statement that was produced by a controller and creates the
     * corresponding JSON response.
     *
     * @param GetResponseForControllerResultEvent $event The HTTP kernel event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        if (!$event->getControllerResult() instanceof StatementInterface) {
            return;
        }

        $response = new Response(
            $this->serializer->serializeStatement($event->getControllerResult()),
            200,
            array('Content-Type' => 'application/json')
        );
        $event->setResponse($response);
    }
}
