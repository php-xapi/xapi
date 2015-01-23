<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Tests\Functional;

use Doctrine\Common\Persistence\ObjectManager;
use Xabbuh\XApi\Storage\Api\Test\Functional\StatementRepositoryTest as BaseStatementRepositoryTest;
use Xabbuh\XApi\Storage\Doctrine\Repository\MappedStatementRepository;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementRepositoryTest extends BaseStatementRepositoryTest
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var MappedStatementRepository
     */
    protected $repository;

    protected function setUp()
    {
        $this->objectManager = $this->createObjectManager();
        $this->repository = $this->createRepository();

        parent::setUp();
    }

    protected function createStatementRepository()
    {
        return new StatementRepository($this->repository);
    }

    protected function cleanDatabase()
    {
        foreach ($this->repository->findMappedStatements(array()) as $statement) {
            $this->objectManager->remove($statement);
        }

        $this->objectManager->flush();
    }

    /**
     * @return ObjectManager
     */
    abstract protected function createObjectManager();

    /**
     * @return string
     */
    abstract protected function getStatementClassName();

    private function createRepository()
    {
        return $this->objectManager->getRepository($this->getStatementClassName());
    }
}
