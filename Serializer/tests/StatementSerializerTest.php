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

    public function testDeserializeMinimalStatement()
    {
        /** @var \Xabbuh\XApi\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            StatementJsonFixtures::getMinimalStatement()
        );

        $this->assertEquals(
            '12345678-1234-5678-8234-567812345678',
            $statement->getId()
        );
        $this->assertEquals(
            'mailto:xapi@adlnet.gov',
            $statement->getActor()->getMbox()
        );

        $verb = $statement->getVerb();
        $display = $verb->getDisplay();
        $this->assertEquals('http://adlnet.gov/expapi/verbs/created', $verb->getId());
        $this->assertEquals('created', $display['en-US']);

        /** @var \Xabbuh\XApi\Model\Activity $activity */
        $activity = $statement->getObject();
        $this->assertEquals(
            'http://example.adlnet.gov/xapi/example/activity',
            $activity->getId()
        );
    }

    public function testDeserializeWithStatementReference()
    {
        /** @var \Xabbuh\XApi\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            StatementJsonFixtures::getStatementWithStatementRef()
        );

        $this->assertEquals(
            '12345678-1234-5678-8234-567812345678',
            $statement->getId()
        );
        $this->assertEquals(
            'mailto:xapi@adlnet.gov',
            $statement->getActor()->getMbox()
        );

        $verb = $statement->getVerb();
        $display = $verb->getDisplay();
        $this->assertEquals('http://adlnet.gov/expapi/verbs/created', $verb->getId());
        $this->assertEquals('created', $display['en-US']);

        /** @var \Xabbuh\XApi\Model\StatementReferenceInterface $statementReference */
        $statementReference = $statement->getObject();
        $this->assertEquals(
            '8f87ccde-bb56-4c2e-ab83-44982ef22df0',
            $statementReference->getStatementId()
        );
    }

    public function testDeserializeWithSubStatement()
    {
        /** @var \Xabbuh\XApi\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            StatementJsonFixtures::getStatementWithSubStatement()
        );

        $this->assertEquals(
            'mailto:test@example.com',
            $statement->getActor()->getMbox()
        );

        $verb = $statement->getVerb();
        $display = $verb->getDisplay();
        $this->assertEquals('http://example.com/planned', $verb->getId());
        $this->assertEquals('planned', $display['en-US']);

        /** @var \Xabbuh\XApi\Model\SubStatementInterface $subStatement */
        $subStatement = $statement->getObject();
        $this->assertInstanceOf(
            '\Xabbuh\XApi\Model\SubStatementInterface',
            $subStatement
        );

        $this->assertEquals(
            'mailto:test@example.com',
            $subStatement->getActor()->getMbox()
        );

        $verb = $subStatement->getVerb();
        $display = $verb->getDisplay();
        $this->assertEquals('http://example.com/visited', $verb->getId());
        $this->assertEquals('will visit', $display['en-US']);

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Model\ActivityInterface',
            $subStatement->getObject()
        );
    }

    public function testDeserializeWithResult()
    {
        /** @var \Xabbuh\XApi\Model\StatementInterface $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            StatementJsonFixtures::getStatementWithResult()
        );
        $result = $statement->getResult();

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Model\ResultInterface',
            $result
        );
        $this->assertEquals(0.95, $result->getScore()->getScaled(), '', 0.01);
        $this->assertEquals(31, $result->getScore()->getRaw());
        $this->assertEquals(0, $result->getScore()->getMin());
        $this->assertEquals(50, $result->getScore()->getMax());
        $this->assertTrue($result->getSuccess());
        $this->assertTrue($result->getCompletion());
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

    public function testSerializeMinimalStatement()
    {
        $statement = StatementFixtures::getMinimalStatement();

        $this->assertJsonEquals(
            StatementJsonFixtures::getMinimalStatement(),
            $this->statementSerializer->serializeStatement($statement)
        );
    }

    public function testSerializeWithStatementReference()
    {
        $statement = StatementFixtures::getStatementWithStatementRef();

        $this->assertJsonEquals(
            StatementJsonFixtures::getStatementWithStatementRef(),
            $this->statementSerializer->serializeStatement($statement)
        );
    }

    public function testSerializeWithResult()
    {
        $statement = StatementFixtures::getStatementWithResult();

        $this->assertJsonEquals(
            StatementJsonFixtures::getStatementWithResult(),
            $this->statementSerializer->serializeStatement($statement)
        );
    }
}
