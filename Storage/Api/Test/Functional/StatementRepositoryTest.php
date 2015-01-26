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
use Xabbuh\XApi\Model\Statement;
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

    protected function tearDown()
    {
        $this->cleanDatabase();
    }

    /**
     * @expectedException \Xabbuh\XApi\Storage\Api\Exception\NotFoundException
     */
    public function testFetchingNonExistingStatementThrowsException()
    {
        $this->statementRepository->findStatementById('12345678-1234-5678-8234-567812345678');
    }

    /**
     * @dataProvider getStatementsWithoutId
     */
    public function testUuidIsGeneratedForNewStatementIfNotPresent(Statement $statement)
    {
        $statementId = $this->statementRepository->storeStatement($statement);

        $this->assertNull($statement->getId());
        $this->assertRegExp(self::UUID_REGEXP, $statementId);
    }

    /**
     * @dataProvider getStatementsWithId
     */
    public function testUuidIsNotGeneratedForNewStatementIfPresent(Statement $statement)
    {
        $statementId = $this->statementRepository->storeStatement($statement);

        $this->assertEquals($statement->getId(), $statementId);
    }

    /**
     * @dataProvider getStatementsWithId
     */
    public function testCreatedStatementCanBeRetrievedByOriginalId(Statement $statement)
    {
        $this->statementRepository->storeStatement($statement);
        $fetchedStatement = $this->statementRepository->findStatementById($statement->getId());

        $this->assertStatementEquals($statement, $fetchedStatement);
    }

    /**
     * @dataProvider getStatementsWithoutId
     */
    public function testCreatedStatementCanBeRetrievedByGeneratedId(Statement $statement)
    {
        $statementId = $this->statementRepository->storeStatement($statement);
        $fetchedStatement = $this->statementRepository->findStatementById($statementId);

        $this->assertNull($statement->getId());
        $this->assertStatementEquals($statement, $fetchedStatement, false);
    }

    public function getStatementsWithId()
    {
        return $this->getStatements(StatementFixtures::DEFAULT_STATEMENT_ID);
    }

    public function getStatementsWithoutId()
    {
        return $this->getStatements(null);
    }

    abstract protected function createStatementRepository();

    abstract protected function cleanDatabase();

    private function getStatements($id)
    {
        return array(
            'minimal-statement' => array(StatementFixtures::getMinimalStatement($id)),
            'statement-with-group-actor' => array(StatementFixtures::getStatementWithGroupActor($id)),
            'statement-with-group-actor-without-members' => array(StatementFixtures::getStatementWithGroupActorWithoutMembers($id)),
            'object-is-statement-reference' => array(StatementFixtures::getStatementWithStatementRef($id)),
            'statement-with-result' => array(StatementFixtures::getStatementWithResult($id)),
        );
    }

    private function assertStatementEquals(Statement $expected, Statement $actual, $validateId = true)
    {
        if ($validateId) {
            $this->assertSame($expected->getId(), $actual->getId());
        }

        $this->assertTrue($actual->getActor()->equals($expected->getActor()));
        $this->assertTrue($actual->getVerb()->equals($expected->getVerb()));
        $this->assertTrue($actual->getObject()->equals($expected->getObject()));

        if (null === $expected->getResult()) {
            $this->assertNull($actual->getResult());
        } else {
            $this->assertTrue($actual->getResult()->equals($expected->getResult()));
        }
    }
}
