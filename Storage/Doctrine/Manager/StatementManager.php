<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Manager;

use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementsFilter;
use Xabbuh\XApi\Storage\Api\Exception\NotFoundException;
use Xabbuh\XApi\Storage\Api\StatementManagerInterface;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface;

/**
 * Doctrine based {@link Statement} manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManager implements StatementManagerInterface
{
    /**
     * @var StatementRepositoryInterface The statement repository
     */
    private $repository;

    public function __construct(StatementRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritDoc}
     */
    public function findStatementById($statementId)
    {
        /** @var Statement $statement */
        $statement = $this->repository->findOneBy(array('id' => $statementId));

        if (null === $statement || $statement->isVoidStatement()) {
            throw new NotFoundException();
        }

        return $statement;
    }

    /**
     * {@inheritDoc}
     */
    public function findVoidedStatementById($statementId)
    {
        /** @var Statement $statement */
        $statement = $this->repository->findOneBy(array('id' => $statementId));

        if (null === $statement || !$statement->isVoidStatement()) {
            throw new NotFoundException();
        }

        return $statement;
    }

    /**
     * {@inheritDoc}
     */
    public function findStatementsBy(StatementsFilter $filter)
    {
        return $this->repository->findBy($filter->getFilter());
    }

    /**
     * {@inheritDoc}
     */
    public function save(Statement $statement, $flush = true)
    {
        $this->repository->save($statement, $flush);
    }
}
