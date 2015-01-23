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

use Rhumsaa\Uuid\Uuid;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementsFilter;
use Xabbuh\XApi\Storage\Api\Exception\NotFoundException;
use Xabbuh\XApi\Storage\Api\Mapping\MappedStatement;

/**
 * {@link Statement} repository.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementRepository
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
    final public function findStatementById($statementId)
    {
        $mappedStatement = $this->findMappedStatement(array('id' => $statementId));

        if (null === $mappedStatement) {
            throw new NotFoundException();
        }

        $statement = $mappedStatement->getModel();

        if ($statement->isVoidStatement()) {
            throw new NotFoundException();
        }

        return $statement;
    }

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
    final public function findVoidedStatementById($voidedStatementId)
    {
        $mappedStatement = $this->findMappedStatement(array('id' => $voidedStatementId));

        if (null === $mappedStatement) {
            throw new NotFoundException();
        }

        $statement = $mappedStatement->getModel();

        if (!$statement->isVoidStatement()) {
            throw new NotFoundException();
        }

        return $statement;
    }

    /**
     * Finds a collection of {@link Statement Statements} filtered by the given
     * criteria.
     *
     * @param StatementsFilter $criteria The criteria to filter by
     *
     * @return Statement[] The statements
     */
    final public function findStatementsBy(StatementsFilter $criteria)
    {
        $mappedStatements = $this->findMappedStatements($criteria->getFilter());
        $statements = array();

        foreach ($mappedStatements as $mappedStatement) {
            $statements[] = $mappedStatement->getModel();
        }

        return $statements;
    }

    /**
     * Writes a {@link Statement} to the underlying data storage.
     *
     * @param Statement $statement The statement to store
     * @param bool      $flush     Whether or not to flush the managed objects
     *                             immediately (i.e. write them to the data
     *                             storage)
     *
     * @return string The UUID of the created Statement
     */
    final public function storeStatement(Statement $statement, $flush = true)
    {
        $uuid = $statement->getId();
        $mappedStatement = MappedStatement::createFromModel($statement);

        if (null === $uuid) {
            $uuid = Uuid::uuid4()->toString();
            $mappedStatement->id = $uuid;
        }

        $this->storeMappedStatement($mappedStatement, $flush);

        return $uuid;
    }

    /**
     * Loads a certain {@link MappedStatement} from the data storage.
     *
     * @param array $criteria Criteria to filter a statement by
     *
     * @return MappedStatement The mapped statement
     */
    abstract protected function findMappedStatement(array $criteria);

    /**
     * Loads {@link MappedStatement mapped statements} from the data storage.
     *
     * @param array $criteria Criteria to filter statements by
     *
     * @return MappedStatement[] The mapped statements
     */
    abstract protected function findMappedStatements(array $criteria);

    /**
     * Writes a {@link MappedStatement mapped statement} to the underlying
     * data storage.
     *
     * @param MappedStatement $mappedStatement The statement to store
     * @param bool            $flush           Whether or not to flush the managed
     *                                         objects immediately (i.e. write
     *                                         them to the data storage)
     */
    abstract protected function storeMappedStatement(MappedStatement $mappedStatement, $flush);
}
