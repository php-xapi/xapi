<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Serializer;

use Xabbuh\XApi\Model\StatementResultInterface;

/**
 * Serialize and deserialize {@link \Xabbuh\XApi\Model\StatementResultInterface statement results}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementResultSerializerInterface
{
    /**
     * Serializes a statement result into a JSON encoded string.
     *
     * @param StatementResultInterface $statementResult The statement result to serialize
     *
     * @return string The serialized statement result
     */
    public function serializeStatementResult(StatementResultInterface $statementResult);

    /**
     * Parses a serialized statement result.
     *
     * @param string $data The serialized statement result
     *
     * @return StatementResultInterface The parsed statement result
     */
    public function deserializeStatementResult($data);
}
