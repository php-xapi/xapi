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
use Xabbuh\XApi\Storage\Api\StatementManagerInterface;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementManagerTest extends \PHPUnit_Framework_TestCase
{
    const UUID_REGEXP = '/^[a-f0-9]{8}-[a-f0-9]{4}-[1-5][a-f0-9]{3}-[89ab][a-f0-9]{3}-[a-f0-9]{12}$/i';

    /**
     * @var StatementManagerInterface
     */
    private $statementManager;

    protected function setUp()
    {
        $this->statementManager = $this->createStatementManager();
        $this->cleanDatabase();
    }

    /**
     * @expectedException \Xabbuh\XApi\Storage\Api\Exception\NotFoundException
     */
    public function testFetchingNonExistingStatementThrowsException()
    {
        $this->statementManager->findStatementById('12345678-1234-5678-8234-567812345678');
    }

    public function testUuidIsGeneratedForNewStatement()
    {
        $statement = StatementFixtures::getMinimalStatement(null);
        $statementId = $this->statementManager->save($statement);

        $this->assertRegExp(self::UUID_REGEXP, $statementId);
    }

    public function testCreatedStatementCanBeRetrieved()
    {
        $statement = StatementFixtures::getMinimalStatement(null);
        $this->statementManager->save($statement);

        $this->assertTrue(true);
    }

    abstract protected function createStatementManager();

    abstract protected function cleanDatabase();
}
