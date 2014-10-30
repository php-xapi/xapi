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

use Xabbuh\XApi\Model\StatementResult;

/**
 * Serialize and deserialize {@link StatementResult statement results}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementResultSerializerInterface
{
    /**
     * Serializes a statement result into a JSON encoded string.
     *
     * @param StatementResult $statementResult The statement result to serialize
     *
     * @return string The serialized statement result
     */
    public function serializeStatementResult(StatementResult $statementResult);

    /**
     * Parses a serialized statement result.
     *
     * @param string $data The serialized statement result
     *
     * @return StatementResult The parsed statement result
     */
    public function deserializeStatementResult($data);
}
