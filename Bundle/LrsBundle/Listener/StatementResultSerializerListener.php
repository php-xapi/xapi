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
use Xabbuh\XApi\Common\Model\StatementResultInterface;
use Xabbuh\XApi\Common\Serializer\StatementResultSerializerInterface;

/**
 * Kernel event listener transforming statement results into proper JSON
 * responses.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultSerializerListener
{
    /**
     * @var \Xabbuh\XApi\Common\Serializer\StatementResultSerializerInterface
     */
    private $serializer;

    public function __construct(StatementResultSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Serializes a statement result that was produced by a controller and
     * creates the corresponding JSON response.
     *
     * @param GetResponseForControllerResultEvent $event The HTTP kernel event
     */
    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        if (!$event->getControllerResult() instanceof StatementResultInterface) {
            return;
        }

        $response = new Response(
            $this->serializer->serializeStatementResult($event->getControllerResult()),
            200,
            array('Content-Type' => 'application/json')
        );
        $event->setResponse($response);
    }
}
