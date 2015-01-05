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
use Xabbuh\XApi\Storage\Api\Test\Functional\StatementManagerTest as BaseStatementManagerTest;
use Xabbuh\XApi\Storage\Doctrine\Manager\StatementManager;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementManagerTest extends BaseStatementManagerTest
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var StatementRepositoryInterface
     */
    protected $repository;

    protected function setUp()
    {
        $this->objectManager = $this->createObjectManager();
        $this->repository = $this->createRepository();

        parent::setUp();
    }

    protected function createStatementManager()
    {
        return new StatementManager($this->repository);
    }

    protected function createRepository()
    {
        return $this->objectManager->getRepository($this->getStatementClassName());
    }

    /**
     * @return ObjectManager
     */
    abstract protected function createObjectManager();

    /**
     * @return string
     */
    abstract protected function getStatementClassName();
}
