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
use Xabbuh\XApi\Model\StatementsFilter;
use Xabbuh\XApi\Storage\Api\Exception\NotFoundException;

/**
 * Statement manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementManagerInterface
{
    /**
     * Finds a {@link Statement} by id.
     *
     * @param string $statementId The statement id to filter by
     *
     * @return Statement The statement
     *
     * @throws NotFoundException if no Statement with the given UUID does exist
     */
    public function findStatementById($statementId);

    /**
     * Finds a voided {@link Statement} by id.
     *
     * @param string $voidedStatementId The voided statement id to filter by
     *
     * @return Statement The statement
     *
     * @throws NotFoundException if no voided Statement with the given UUID
     *                           does exist
     */
    public function findVoidedStatementById($voidedStatementId);

    /**
     * Finds a collection of {@link Statement Statements} filtered by the given
     * criteria.
     *
     * @param StatementsFilter $criteria The criteria to filter by
     *
     * @return Statement[] The statements
     */
    public function findStatementsBy(StatementsFilter $criteria);

    /**
     * Stores a {@link Statement}.
     *
     * @param Statement $statement The statement to store
     * @param bool      $flush     Whether or not to flush the managed objects
     *                             immediately (i.e. write them to the data
     *                             storage)
     *
     * @return string The UUID of the created Statement
     */
    public function save(Statement $statement, $flush = true);
}
