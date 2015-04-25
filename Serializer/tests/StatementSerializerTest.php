<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Tests;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Serializer\StatementSerializer;
use Xabbuh\XApi\Serializer\Tests\Fixtures\StatementJsonFixtures;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementSerializerTest extends AbstractSerializerTest
{
    /**
     * @var StatementSerializer
     */
    private $statementSerializer;

    protected function setUp()
    {
        parent::setUp();
        $this->statementSerializer = new StatementSerializer($this->serializer);
    }

    /**
     * @dataProvider statementProvider
     *
     * @param string    $serializedStatement
     * @param Statement $expectedStatement
     */
    public function testDeserializeStatement($serializedStatement, Statement $expectedStatement)
    {
        $statement = $this->statementSerializer->deserializeStatement($serializedStatement);

        $this->assertTrue($expectedStatement->equals($statement));
    }

    /**
     * @dataProvider statementProvider
     *
     * @param string    $expectedStatement
     * @param Statement $statement
     */
    public function testSerializeStatement($expectedStatement, Statement $statement)
    {
        $serializedStatement = $this->statementSerializer->serializeStatement($statement);

        $this->assertJsonEquals($expectedStatement, $serializedStatement);
    }

    public function statementProvider()
    {
        return array(
            'minimal-statement' => array(
                StatementJsonFixtures::getMinimalStatement(),
                StatementFixtures::getMinimalStatement(),
            ),
            'statement-reference' => array(
                StatementJsonFixtures::getStatementWithStatementRef(),
                StatementFixtures::getStatementWithStatementRef(),
            ),
            'statement-with-sub-statement' => array(
                StatementJsonFixtures::getStatementWithSubStatement(),
                StatementFixtures::getStatementWithSubStatement(),
            ),
            'statement-with-result' => array(
                StatementJsonFixtures::getStatementWithResult(),
                StatementFixtures::getStatementWithResult(),
            ),
            'statement-with-agent-authority' => array(
                StatementJsonFixtures::getStatementWithAgentAuthority(),
                StatementFixtures::getStatementWithAgentAuthority(),
            ),
            'statement-with-group-authority' => array(
                StatementJsonFixtures::getStatementWithGroupAuthority(),
                StatementFixtures::getStatementWithGroupAuthority(),
            ),
        );
    }

    public function testDeserializeStatementCollection()
    {
        /** @var \Xabbuh\XApi\Model\Statement[] $statements */
        $statements = $this->statementSerializer->deserializeStatements(
            StatementJsonFixtures::getStatementCollection()
        );

        $this->assertTrue(is_array($statements));
        $this->assertCount(2, $statements);
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345678',
            $statements[0]->getId()
        );
        $this->assertEquals(
            '12345678-1234-5678-8234-567812345679',
            $statements[1]->getId()
        );
    }
}
