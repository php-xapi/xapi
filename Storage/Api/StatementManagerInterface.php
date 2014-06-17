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

use Xabbuh\XApi\Common\Model\StatementInterface;

/**
 * Statement manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementManagerInterface
{
    /**
     * Find a {@link StatementInterface statement} by id.
     *
     * @param string $statementId The statement id to filter by
     *
     * @return StatementInterface The statement
     */
    public function findStatementById($statementId);

    /**
     * Find a {@link StatementInterface statement} by the given criteria.
     *
     * @param array $criteria The criteria to filter by
     *
     * @return StatementInterface The statement
     */
    public function findStatementBy(array $criteria);

    /**
     * Find a collection of {@link StatementInterface statements} by the given
     * criteria.
     *
     * @param array $criteria The criteria to filter by
     *
     * @return StatementInterface[] The statements
     */
    public function findStatementsBy(array $criteria);

    /**
     * Stores a {@link StatementInterface statement}.
     *
     * @param StatementInterface $statement The statement to store
     */
    public function updateStatement(StatementInterface $statement);
}
