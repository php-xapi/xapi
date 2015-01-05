<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Tests\Unit\Manager;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\DataFixtures\VerbFixtures;
use Xabbuh\XApi\Model\StatementsFilter;
use Xabbuh\XApi\Storage\Doctrine\Manager\StatementManager;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|\Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface
     */
    private $repository;

    /**
     * @var StatementManager
     */
    private $statementManager;

    protected function setUp()
    {
        $this->repository = $this->createRepositoryMock();
        $this->statementManager = new StatementManager($this->repository);
    }

    public function testFindStatementById()
    {
        $statementId = md5(uniqid());
        $this
            ->repository
            ->expects($this->once())
            ->method('findOneBy')
            ->with(array('id' => $statementId))
            ->will($this->returnValue(StatementFixtures::getMinimalStatement()));

        $this->statementManager->findStatementById($statementId);
    }

    public function testFindStatementsByCriteria()
    {
        $verb = VerbFixtures::getVerb();

        $this
            ->repository
            ->expects($this->once())
            ->method('findBy')
            ->with($this->equalTo(array('verb' => $verb->getId())));

        $filter = new StatementsFilter();
        $filter->byVerb($verb);
        $this->statementManager->findStatementsBy($filter);
    }

    public function testSave()
    {
        $statement = StatementFixtures::getMinimalStatement();
        $this
            ->repository
            ->expects($this->once())
            ->method('save')
            ->with($this->equalTo($statement));

        $this->statementManager->save($statement);
    }

    public function testSaveWithoutFlush()
    {
        $statement = StatementFixtures::getMinimalStatement();
        $this
            ->repository
            ->expects($this->once())
            ->method('save')
            ->with($this->equalTo($statement), false);

        $this->statementManager->save($statement, false);
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface
     */
    protected function createRepositoryMock()
    {
        return $this->getMock('\Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface');
    }
}
