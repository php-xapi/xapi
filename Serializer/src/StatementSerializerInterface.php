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

use Xabbuh\XApi\Model\StatementInterface;

/**
 * Serialize and deserialize {@link \Xabbuh\XApi\Model\StatementInterface statements}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementSerializerInterface
{
    /**
     * Serializes a statement into a JSON encoded string.
     *
     * @param StatementInterface $statement The statement to serialize
     *
     * @return string The serialized statement
     */
    public function serializeStatement(StatementInterface $statement);

    /**
     * Serializes a collection of statements into a JSON encoded string.
     *
     * @param StatementInterface[] $statements The statements to serialize
     *
     * @return string The serialized statements
     */
    public function serializeStatements(array $statements);

    /**
     * Parses a serialized statement.
     *
     * @param string $data The serialized statement
     *
     * @return StatementInterface The parsed statement
     */
    public function deserializeStatement($data);

    /**
     * Parses a serialized collection of statements.
     *
     * @param string $data The serialized statements
     *
     * @return StatementInterface[] The parsed statements
     */
    public function deserializeStatements($data);
}
