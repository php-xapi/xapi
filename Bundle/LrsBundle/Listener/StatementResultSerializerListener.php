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

use Xabbuh\XApi\Model\StatementResult;
use Xabbuh\XApi\Serializer\StatementResultSerializerInterface;

/**
 * Kernel event listener transforming statement results into proper JSON
 * responses.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultSerializerListener extends AbstractSerializerListener
{
    /**
     * @var StatementResultSerializerInterface
     */
    private $serializer;

    public function __construct(StatementResultSerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    protected function isControllerResultSupported($result)
    {
        return $result instanceof StatementResult;
    }

    /**
     * {@inheritDoc}
     */
    protected function serializeControllerResult($result)
    {
        return $this->serializer->serializeStatementResult($result);
    }
}
