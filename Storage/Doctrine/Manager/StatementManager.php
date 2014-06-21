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

use Xabbuh\XApi\Common\Model\StatementInterface;
use Xabbuh\XApi\Storage\Api\StatementManager as BaseStatementManager;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface;

/**
 * Doctrine based {@link StatementInterface statement} manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManager extends BaseStatementManager
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
    public function findStatementBy(array $criteria)
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function findStatementsBy(array $criteria)
    {
        return $this->repository->findBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function save(StatementInterface $statement, $flush = true)
    {
        $this->repository->save($statement, $flush);
    }
}
