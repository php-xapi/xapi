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
use Xabbuh\XApi\DataFixtures\VerbFixtures;
use Xabbuh\XApi\Model\StatementsFilter;
use Xabbuh\XApi\Storage\Api\Mapping\MappedStatement;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|\Xabbuh\XApi\Storage\Doctrine\Repository\MappedStatementRepository
     */
    private $mappedStatementRepository;

    /**
     * @var StatementRepository
     */
    private $statementRepository;

    protected function setUp()
    {
        $this->mappedStatementRepository = $this->createMappedStatementRepositoryMock();
        $this->statementRepository = new StatementRepository($this->mappedStatementRepository);
    }

    public function testFindStatementById()
    {
        $statementId = md5(uniqid());
        $this
            ->mappedStatementRepository
            ->expects($this->once())
            ->method('findMappedStatement')
            ->with(array('id' => $statementId))
            ->will($this->returnValue(MappedStatement::createFromModel(StatementFixtures::getMinimalStatement())));

        $this->statementRepository->findStatementById($statementId);
    }

    public function testFindStatementsByCriteria()
    {
        $verb = VerbFixtures::getVerb();

        $this
            ->mappedStatementRepository
            ->expects($this->once())
            ->method('findMappedStatements')
            ->with($this->equalTo(array('verb' => $verb->getId())))
            ->will($this->returnValue(array()));

        $filter = new StatementsFilter();
        $filter->byVerb($verb);
        $this->statementRepository->findStatementsBy($filter);
    }

    public function testSave()
    {
        $statement = StatementFixtures::getMinimalStatement();
        $self = $this;
        $this
            ->mappedStatementRepository
            ->expects($this->once())
            ->method('storeMappedStatement')
            ->with(
                $this->callback(function (MappedStatement $mappedStatement) use ($self, $statement) {
                    return $self->assertMappedStatement(
                        MappedStatement::createFromModel($statement),
                        $mappedStatement
                    );
                }),
                true
            );

        $this->statementRepository->storeStatement($statement);
    }

    public function testSaveWithoutFlush()
    {
        $statement = StatementFixtures::getMinimalStatement();
        $self = $this;
        $this
            ->mappedStatementRepository
            ->expects($this->once())
            ->method('storeMappedStatement')
            ->with(
                $this->callback(function (MappedStatement $mappedStatement) use ($self, $statement) {
                    return $self->assertMappedStatement(
                        MappedStatement::createFromModel($statement),
                        $mappedStatement
                    );
                }),
                false
            );

        $this->statementRepository->storeStatement($statement, false);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Xabbuh\XApi\Storage\Doctrine\Repository\MappedStatementRepository
     */
    protected function createMappedStatementRepositoryMock()
    {
        return $this->getMock('\Xabbuh\XApi\Storage\Doctrine\Repository\MappedStatementRepository');
    }

    /**
     * Ths method is only public to support PHP 5.3.
     */
    public function assertMappedStatement(MappedStatement $expected, MappedStatement $actual)
    {
        if ($expected->id !== $actual->id) {
            return false;
        }

        if (!$expected->actor->equals($actual->actor)) {
            return false;
        }

        if (!$expected->verb->equals($actual->verb)) {
            return false;
        }

        if (!$expected->object->equals($actual->object)) {
            return false;
        }

        if (null === $expected->result && null !== $actual->result) {
            return false;
        }

        if (null !== $expected->result && null === $actual->result) {
            return false;
        }

        if (null !== $expected->result && !$expected->result->equals($actual->result)) {
            return false;
        }

        if (null === $expected->authority && null !== $actual->authority) {
            return false;
        }

        if (null !== $expected->authority && null === $actual->authority) {
            return false;
        }

        if (null !== $expected->authority && !$expected->authority->equals($actual->authority)) {
            return false;
        }

        if ($expected->created != $actual->created) {
            return false;
        }

        if (null === $actual->stored) {
            return false;
        }

        return true;
    }
}
