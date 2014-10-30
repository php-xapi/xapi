<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api;

use Xabbuh\XApi\Model\Statement;

/**
 * Statement manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementManagerInterface
{
    /**
     * Find a {@link Statement} by id.
     *
     * @param string $statementId The statement id to filter by
     *
     * @return Statement The statement
     */
    public function findStatementById($statementId);

    /**
     * Find a {@link Statement} by the given criteria.
     *
     * @param array $criteria The criteria to filter by
     *
     * @return Statement The statement
     */
    public function findStatementBy(array $criteria);

    /**
     * Find a collection of {@link Statement} by the given
     * criteria.
     *
     * @param array $criteria The criteria to filter by
     *
     * @return Statement[] The statements
     */
    public function findStatementsBy(array $criteria);

    /**
     * Stores a {@link Statement}.
     *
     * @param Statement $statement The statement to store
     * @param bool      $flush     Whether or not to flush the managed objects
     *                             (i.e. write them to the data storage)
     */
    public function save(Statement $statement, $flush = true);
}
