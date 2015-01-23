<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Tests\Unit\Repository;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\Storage\Api\Mapping\MappedStatement;
use Xabbuh\XApi\Storage\Doctrine\Repository\MappedStatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class MappedStatementRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $objectManager;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $unitOfWork;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $classMetadata;

    /**
     * @var MappedStatementRepository
     */
    private $repository;

    protected function setUp()
    {
        $this->objectManager = $this->createObjectManagerMock();
        $this->unitOfWork = $this->createUnitOfWorkMock();
        $this->classMetadata = $this->createClassMetadataMock();
        $this->repository = $this->createMappedStatementRepository($this->objectManager, $this->unitOfWork, $this->classMetadata);
    }

    public function testStatementDocumentIsPersisted()
    {
        $this
            ->objectManager
            ->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf('\Xabbuh\XApi\Storage\Api\Mapping\MappedStatement'))
        ;

        $mappedStatement = MappedStatement::createFromModel(StatementFixtures::getMinimalStatement());
        $this->repository->storeMappedStatement($mappedStatement, true);
    }

    public function testFlushIsCalledByDefault()
    {
        $this
            ->objectManager
            ->expects($this->once())
            ->method('flush')
        ;

        $mappedStatement = MappedStatement::createFromModel(StatementFixtures::getMinimalStatement());
        $this->repository->storeMappedStatement($mappedStatement);
    }

    public function testCallToFlushCanBeSuppressed()
    {
        $this
            ->objectManager
            ->expects($this->never())
            ->method('flush')
        ;

        $mappedStatement = MappedStatement::createFromModel(StatementFixtures::getMinimalStatement());
        $this->repository->storeMappedStatement($mappedStatement, false);
    }

    abstract protected function getObjectManagerClass();

    protected function createObjectManagerMock()
    {
        return $this
            ->getMockBuilder($this->getObjectManagerClass())
            ->disableOriginalConstructor()
            ->getMock();
    }

    abstract protected function getUnitOfWorkClass();

    protected function createUnitOfWorkMock()
    {
        return $this
            ->getMockBuilder($this->getUnitOfWorkClass())
            ->disableOriginalConstructor()
            ->getMock();
    }

    abstract protected function getClassMetadataClass();

    protected function createClassMetadataMock()
    {
        return $this
            ->getMockBuilder($this->getClassMetadataClass())
            ->disableOriginalConstructor()
            ->getMock();
    }

    abstract protected function createMappedStatementRepository($objectManager, $unitOfWork, $classMetadata);
}
