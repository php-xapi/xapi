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

use Xabbuh\XApi\Common\Model\Activity;
use Xabbuh\XApi\Common\Model\Agent;
use Xabbuh\XApi\Common\Model\Result;
use Xabbuh\XApi\Common\Model\Score;
use Xabbuh\XApi\Common\Model\Statement;
use Xabbuh\XApi\Common\Model\StatementReference;
use Xabbuh\XApi\Common\Model\Verb;
use Xabbuh\XApi\Common\Serializer\StatementSerializer;

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
        /** @var \Xabbuh\XApi\Common\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            $this->loadFixture('minimal_statement')
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

        /** @var \Xabbuh\XApi\Common\Model\Activity $activity */
        $activity = $statement->getObject();
        $this->assertEquals(
            'http://example.adlnet.gov/xapi/example/activity',
            $activity->getId()
        );
    }

    public function testDeserializeWithStatementReference()
    {
        /** @var \Xabbuh\XApi\Common\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            $this->loadFixture('statement_with_statement_ref')
        );

        $this->assertEquals(
            '12345678-1234-5678-1234-567812345678',
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

        /** @var \Xabbuh\XApi\Common\Model\StatementReferenceInterface $statementReference */
        $statementReference = $statement->getObject();
        $this->assertEquals(
            '8f87ccde-bb56-4c2e-ab83-44982ef22df0',
            $statementReference->getStatementId()
        );
    }

    public function testDeserializeWithSubStatement()
    {
        /** @var \Xabbuh\XApi\Common\Model\Statement $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            $this->loadFixture('statement_with_sub_statement')
        );

        $this->assertEquals(
            'mailto:test@example.com',
            $statement->getActor()->getMbox()
        );

        $verb = $statement->getVerb();
        $display = $verb->getDisplay();
        $this->assertEquals('http://example.com/planned', $verb->getId());
        $this->assertEquals('planned', $display['en-US']);

        /** @var \Xabbuh\XApi\Common\Model\SubStatementInterface $subStatement */
        $subStatement = $statement->getObject();
        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\SubStatementInterface',
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
            '\Xabbuh\XApi\Common\Model\ActivityInterface',
            $subStatement->getObject()
        );
    }

    public function testDeserializeWithResult()
    {
        /** @var \Xabbuh\XApi\Common\Model\StatementInterface $statement */
        $statement = $this->statementSerializer->deserializeStatement(
            $this->loadFixture('statement_with_result')
        );
        $result = $statement->getResult();

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\ResultInterface',
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
        /** @var \Xabbuh\XApi\Common\Model\Statement[] $statements */
        $statements = $this->statementSerializer->deserializeStatements(
            $this->loadFixture('statement_collection')
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
        $statement = new Statement();
        $statement->setId('12345678-1234-5678-8234-567812345678');

        $actor = new Agent();
        $actor->setMbox('mailto:xapi@adlnet.gov');
        $statement->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/created');
        $verb->setDisplay(array('en-US' => 'created'));
        $statement->setVerb($verb);

        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/activity');
        $statement->setObject($activity);

        $this->assertJsonEquals(
            $this->loadFixture('minimal_statement'),
            $this->statementSerializer->serializeStatement($statement)
        );
    }

    public function testSerializeWithStatementReference()
    {
        $statement = new Statement();
        $statement->setId('12345678-1234-5678-1234-567812345678');

        $actor = new Agent();
        $actor->setMbox('mailto:xapi@adlnet.gov');
        $statement->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/created');
        $verb->setDisplay(array('en-US' => 'created'));
        $statement->setVerb($verb);

        $statementReference = new StatementReference();
        $statementReference->setStatementId('8f87ccde-bb56-4c2e-ab83-44982ef22df0');
        $statement->setObject($statementReference);

        $this->assertJsonEquals(
            $this->loadFixture('statement_with_statement_ref'),
            $this->statementSerializer->serializeStatement($statement)
        );
    }

    public function testSerializeWithResult()
    {
        $agent = new Agent();
        $agent->setMbox('mailto:alice@example.com');
        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/attempted');
        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/simpleCBT');
        $score = new Score();
        $score->setScaled(0.95);
        $score->setRaw(31);
        $score->setMin(0);
        $score->setMax(50);
        $result = new Result();
        $result->setScore($score);
        $result->setSuccess(true);
        $result->setCompletion(true);
        $statement = new Statement();
        $statement->setActor($agent);
        $statement->setVerb($verb);
        $statement->setObject($activity);
        $statement->setResult($result);

        $this->assertJsonEquals(
            $this->loadFixture('statement_with_result'),
            $this->statementSerializer->serializeStatement($statement)
        );
    }
}
