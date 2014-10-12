<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer;

use JMS\Serializer\SerializerInterface;
use Xabbuh\XApi\Model\StatementResultInterface;

/**
 * Serialize and deserialize {@link \Xabbuh\XApi\Model\StatementResultInterface statement results}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultSerializer implements StatementResultSerializerInterface
{
    /**
     * @var SerializerInterface The underlying serializer
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeStatementResult(StatementResultInterface $statementResult)
    {
        return $this->serializer->serialize($statementResult, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeStatementResult($data)
    {
        return $this->serializer->deserialize(
            $data,
            'Xabbuh\XApi\Model\StatementResult',
            'json'
        );
    }
}
