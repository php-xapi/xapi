<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api\Test\Functional;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\Storage\Api\StatementRepository;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementRepositoryTest extends \PHPUnit_Framework_TestCase
{
    const UUID_REGEXP = '/^[a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/i';

    /**
     * @var StatementRepository
     */
    private $statementRepository;

    protected function setUp()
    {
        $this->statementRepository = $this->createStatementRepository();
        $this->cleanDatabase();
    }

    /**
     * @expectedException \Xabbuh\XApi\Storage\Api\Exception\NotFoundException
     */
    public function testFetchingNonExistingStatementThrowsException()
    {
        $this->statementRepository->findStatementById('12345678-1234-5678-8234-567812345678');
    }

    public function testUuidIsGeneratedForNewStatement()
    {
        $statement = StatementFixtures::getMinimalStatement(null);
        $statementId = $this->statementRepository->storeStatement($statement);

        $this->assertRegExp(self::UUID_REGEXP, $statementId);
    }

    public function testCreatedStatementCanBeRetrieved()
    {
        $statement = StatementFixtures::getMinimalStatement(null);
        $statementId = $this->statementRepository->storeStatement($statement);
        $fetchedStatement = $this->statementRepository->findStatementById($statementId);

        $this->assertNull($statement->getId());
        $this->assertTrue($fetchedStatement->getActor()->equals($statement->getActor()));
        $this->assertTrue($fetchedStatement->getVerb()->equals($statement->getVerb()));
        $this->assertTrue($fetchedStatement->getObject()->equals($statement->getObject()));

        if (null === $fetchedStatement->getResult()) {
            $this->assertNull($statement->getResult());
        } else {
            $this->assertTrue($fetchedStatement->getResult()->equals($statement->getResult()));
        }
    }

    abstract protected function createStatementRepository();

    abstract protected function cleanDatabase();
}
