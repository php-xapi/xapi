<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Tests\Model;
use Xabbuh\XApiCommon\Model\Activity;
use Xabbuh\XApiCommon\Model\Actor;
use Xabbuh\XApiCommon\Model\Statement;
use Xabbuh\XApiCommon\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends ModelTest
{
    public function testDeserializeMinimalStatement()
    {
        /** @var \Xabbuh\XApiCommon\Model\Statement $statement */
        $statement = $this->deserialize($this->loadFixture('minimal_statement'));

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

        $this->assertEquals(
            'http://example.adlnet.gov/xapi/example/activity',
            $statement->getObject()->getId()
        );
    }

    public function testSerializeMinimalStatement()
    {
        $this->markTestSkipped(
            'waiting for https://github.com/schmittjoh/serializer/pull/238 to get merged'
        );

        $statement = new Statement();
        $statement->setId('12345678-1234-5678-1234-567812345678');

        $actor = new Actor();
        $actor->setMbox('mailto:xapi@adlnet.gov');
        $statement->setActor($actor);

        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/created');
        $verb->setDisplay(array('en-US' => 'created'));
        $statement->setVerb($verb);

        $activity = new Activity();
        $activity->setId('http://example.adlnet.gov/xapi/example/activity');
        $statement->setObject($activity);

        $this->serializeAndValidateData(
            $this->loadFixture('minimal_statement'),
            $statement
        );
    }

    public function testValidateMinimalStatement()
    {
        $statement = $this->loadAndDeserialize('minimal_statement');

        $this->validateStatement($statement, 0);
    }

    public function testValidStatement()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Actor());
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 0);
    }

    public function testWithoutId()
    {
        $statement = new Statement();
        $statement->setActor(new Actor());
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutActor()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutVerb()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Actor());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutObject()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Actor());
        $statement->setVerb(new Verb());

        $this->validateStatement($statement, 1);
    }

    private function validateStatement(Statement $statement, $violationCount)
    {
        $this->assertEquals($violationCount, $this->validator->validate($statement)->count());
    }
}
