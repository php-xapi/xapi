<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\Activity;
use Xabbuh\XApi\Common\Model\Actor;
use Xabbuh\XApi\Common\Model\Statement;
use Xabbuh\XApi\Common\Model\StatementResult;
use Xabbuh\XApi\Common\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultTest extends ModelTest
{
    public function testDeserializeStatementResult()
    {
        /** @var \Xabbuh\XApi\Common\Model\StatementResult $statementResult */
        $statementResult = $this->deserialize($this->loadFixture('statement_result'));
        $statements = $statementResult->getStatements();

        $this->assertEquals(2, count($statements));
        $this->assertEquals(
            '12345678-1234-5678-1234-567812345678',
            $statements[0]->getId()
        );
        $this->assertEquals(
            '12345678-1234-5678-1234-567812345679',
            $statements[1]->getId()
        );
    }

    public function testSerializeMinimalStatement()
    {
        $statement1 = new Statement();
        $statement1->setId('12345678-1234-5678-1234-567812345678');

        $actor = new Actor();
        $actor->setMbox('mailto:alice@example.com');
        $statement1->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/created');
        $verb->setDisplay(array('en-US' => 'created'));
        $statement1->setVerb($verb);

        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/activity');
        $statement1->setObject($activity);

        $statement2 = new Statement();
        $statement2->setId('12345678-1234-5678-1234-567812345679');

        $actor = new Actor();
        $actor->setMbox('mailto:bob@example.com');
        $statement2->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/deleted');
        $verb->setDisplay(array('en-US' => 'deleted'));
        $statement2->setVerb($verb);

        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/activity');
        $statement2->setObject($activity);

        $statementResult = new StatementResult();
        $statementResult->setStatements(array($statement1, $statement2));

        $this->serializeAndValidateData(
            $this->loadFixture('statement_result'),
            $statementResult
        );
    }
}
