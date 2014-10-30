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

use Xabbuh\XApi\Model\Statement;

/**
 * Serialize and deserialize {@link Statement statements}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementSerializerInterface
{
    /**
     * Serializes a statement into a JSON encoded string.
     *
     * @param Statement $statement The statement to serialize
     *
     * @return string The serialized statement
     */
    public function serializeStatement(Statement $statement);

    /**
     * Serializes a collection of statements into a JSON encoded string.
     *
     * @param Statement[] $statements The statements to serialize
     *
     * @return string The serialized statements
     */
    public function serializeStatements(array $statements);

    /**
     * Parses a serialized statement.
     *
     * @param string $data The serialized statement
     *
     * @return Statement The parsed statement
     */
    public function deserializeStatement($data);

    /**
     * Parses a serialized collection of statements.
     *
     * @param string $data The serialized statements
     *
     * @return Statement[] The parsed statements
     */
    public function deserializeStatements($data);
}
