<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer;

use Xabbuh\XApi\Common\Serializer\StatementResultSerializer;
use Xabbuh\XApi\Common\Tests\Fixtures\StatementResultJsonFixtures;
use Xabbuh\XApi\DataFixtures\StatementResultFixtures;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultSerializerTest extends AbstractSerializerTest
{
    /**
     * @var StatementResultSerializer
     */
    private $statementResultSerializer;

    protected function setUp()
    {
        parent::setUp();
        $this->statementResultSerializer = new StatementResultSerializer($this->serializer);
    }
    public function testDeserializeStatementResult()
    {
        /** @var \Xabbuh\XApi\Common\Model\StatementResult $statementResult */
        $statementResult = $this->statementResultSerializer->deserializeStatementResult(
            StatementResultJsonFixtures::getStatementResult()
        );
        $statements = $statementResult->getStatements();

        $this->assertEquals(2, count($statements));
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345678',
            $statements[0]->getId()
        );
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345679',
            $statements[1]->getId()
        );
        $this->assertNull($statementResult->getMoreUrlPath());
    }

    public function testSerializeMinimalStatement()
    {
        $statementResult = StatementResultFixtures::getStatementResult();

        $this->assertJsonEquals(
            StatementResultJsonFixtures::getStatementResult(),
            $this->statementResultSerializer->serializeStatementResult($statementResult)
        );
    }

    public function testDeserializeStatementResultWithMore()
    {
        /** @var \Xabbuh\XApi\Common\Model\StatementResult $statementResult */
        $statementResult = $this->statementResultSerializer->deserializeStatementResult(
            StatementResultJsonFixtures::getStatementResultWithMore()
        );
        $statements = $statementResult->getStatements();

        $this->assertEquals(2, count($statements));
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345678',
            $statements[0]->getId()
        );
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345679',
            $statements[1]->getId()
        );
        $this->assertEquals(
            '/xapi/statements/more/b381d8eca64a61a42c7b9b4ecc2fabb6',
            $statementResult->getMoreUrlPath()
        );
    }

    public function testSerializeMinimalStatementWithMore()
    {
        $statementResult = StatementResultFixtures::getStatementResultWithMore();

        $this->assertJsonEquals(
            StatementResultJsonFixtures::getStatementResultWithMore(),
            $this->statementResultSerializer->serializeStatementResult($statementResult)
        );
    }
}
