<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Tests\Unit\Repository;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\Storage\MongoDB\Document\Statement;
use Xabbuh\XApi\Storage\MongoDB\Repository\StatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StatementRepository
     */
    private $repository;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|\Doctrine\ODM\MongoDB\DocumentManager
     */
    private $manager;

    protected function setUp()
    {
        $this->manager = $this->createDocumentManagerMock();
        $this->repository = new StatementRepository(
            $this->manager,
            $this->createUnitOfWorkMock(),
            $this->createClassMetadataMock()
        );
    }

    public function testStatementDocumentIsPersisted()
    {
        $this
            ->manager
            ->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf('\Xabbuh\XApi\Storage\MongoDB\Document\Statement'));

        $this->repository->save(StatementFixtures::getMinimalStatement());
    }

    public function testStatementDocumentIsNotWrapped()
    {
        $statement = new Statement(StatementFixtures::getMinimalStatement());
        $this
            ->manager
            ->expects($this->once())
            ->method('persist')
            ->with($this->identicalTo($statement));

        $this->repository->save($statement);
    }

    public function testFlushIsCalledByDefault()
    {
        $this->manager->expects($this->once())->method('flush');

        $this->repository->save(StatementFixtures::getMinimalStatement());
    }

    public function testCallToFlushCanBeSuppressed()
    {
        $this->manager->expects($this->never())->method('flush');

        $this->repository->save(StatementFixtures::getMinimalStatement(), false);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Doctrine\ODM\MongoDB\DocumentManager
     */
    private function createDocumentManagerMock()
    {
        return $this
            ->getMockBuilder('Doctrine\ODM\MongoDB\DocumentManager')
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Doctrine\ODM\MongoDB\UnitOfWork
     */
    private function createUnitOfWorkMock()
    {
        return $this
            ->getMockBuilder('Doctrine\ODM\MongoDB\UnitOfWork')
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Doctrine\ODM\MongoDB\Mapping\ClassMetadata
     */
    private function createClassMetadataMock()
    {
        return $this
            ->getMockBuilder('Doctrine\ODM\MongoDB\Mapping\ClassMetadata')
            ->disableOriginalConstructor()
            ->getMock()
        ;
    }
}
