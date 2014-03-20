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
use Xabbuh\XApi\Common\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends ModelTest
{
    public function testDeserializeMinimalStatement()
    {
        /** @var \Xabbuh\XApi\Common\Model\Statement $statement */
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

        /** @var \Xabbuh\XApi\Common\Model\Activity $activity */
        $activity = $statement->getObject();
        $this->assertEquals(
            'http://example.adlnet.gov/xapi/example/activity',
            $activity->getId()
        );
    }

    public function testSerializeMinimalStatement()
    {
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
