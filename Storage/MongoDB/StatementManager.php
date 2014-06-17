<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;
use Xabbuh\XApi\Common\Model\StatementInterface;
use Xabbuh\XApi\Storage\Api\StatementManager as BaseStatementManager;
use Xabbuh\XApi\Storage\MongoDB\Document\Statement;

/**
 * MongoDB driver for the statement storage.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManager extends BaseStatementManager
{
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public function findStatementBy(array $criteria)
    {
        $repository = $this->manager->getRepository('Xabbuh\XApi\Storage\MongoDB\Document\Statement');

        return $repository->findOneBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function findStatementsBy(array $criteria)
    {
        $repository = $this->manager->getRepository('Xabbuh\XApi\Storage\MongoDB\Document\Statement');

        return $repository->findBy($criteria);
    }

    /**
     * {@inheritDoc}
     */
    public function updateStatement(StatementInterface $statement)
    {
        if (!$statement instanceof Statement) {
            $statement = new Statement($statement);
        }

        $this->manager->persist($statement);
        $this->manager->flush();
    }
}
