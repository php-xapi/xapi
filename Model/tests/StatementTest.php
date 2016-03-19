<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model\Tests;

use Xabbuh\XApi\Model\Account;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Group;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends \PHPUnit_Framework_TestCase
{
    public function testGetStatementReference()
    {
        $statement = new Statement(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            new Agent(),
            new Verb('the-verb-id'),
            new Activity()
        );
        $statementReference = $statement->getStatementReference();

        $this->assertInstanceOf('\Xabbuh\XApi\Model\StatementReference', $statementReference);
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }

    public function testGetVoidStatement()
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $statement = new Statement(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $actor,
            new Verb('verb-id'),
            new Activity()
        );
        $voidStatement = $statement->getVoidStatement($actor);

        /** @var \Xabbuh\XApi\Model\StatementReference $statementReference */
        $statementReference = $voidStatement->getObject();

        $this->assertEquals($actor, $voidStatement->getActor());
        $this->assertTrue($voidStatement->getVerb()->isVoidVerb());
        $this->assertInstanceOf('\Xabbuh\XApi\Model\StatementReference', $statementReference);
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }

    public function testWithAuthority()
    {
        $statement = $this->createMinimalStatement();
        $authority = $this->createAgent();
        $statementWithAuthority = $statement->withAuthority($authority);

        $this->assertFalse($statement->equals($statementWithAuthority));
        $this->assertNull($statement->getAuthority());
        $this->assertSame($statement->getId(), $statementWithAuthority->getId());
        $this->assertTrue($statement->getActor()->equals($statementWithAuthority->getActor()));
        $this->assertTrue($statement->getVerb()->equals($statementWithAuthority->getVerb()));
        $this->assertTrue($statement->getObject()->equals($statementWithAuthority->getObject()));
        $this->assertTrue($authority->equals($statementWithAuthority->getAuthority()));
    }

    public function testWithAuthorityReplacesExistingAuthority()
    {
        $statement = $this->createStatementWithGroupAuthority();
        $agentAuthority = $this->createAgent();
        $statementWithAuthority = $statement->withAuthority($agentAuthority);

        $this->assertFalse($statement->equals($statementWithAuthority));
        $this->assertSame($statement->getId(), $statementWithAuthority->getId());
        $this->assertTrue($statement->getActor()->equals($statementWithAuthority->getActor()));
        $this->assertTrue($statement->getVerb()->equals($statementWithAuthority->getVerb()));
        $this->assertTrue($statement->getObject()->equals($statementWithAuthority->getObject()));
        $this->assertTrue($agentAuthority->equals($statementWithAuthority->getAuthority()));
        $this->assertFalse($statement->getAuthority()->equals($statementWithAuthority->getAuthority()));
    }

    private function createMinimalStatement()
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $verb = new Verb('http://adlnet.gov/expapi/verbs/created', array('en-US' => 'created'));
        $activity = new Activity('http://example.adlnet.gov/xapi/example/activity');

        return new Statement('12345678-1234-5678-8234-567812345678', $actor, $verb, $activity);
    }

    private function createStatementWithGroupAuthority()
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $verb = new Verb('http://adlnet.gov/expapi/verbs/created', array('en-US' => 'created'));
        $activity = new Activity('http://example.adlnet.gov/xapi/example/activity');
        $user = new Agent(null, null, null, new Account('oauth_consumer_x75db', 'http://example.com/xAPI/OAuth/Token'));
        $application = new Agent('mailto:bob@example.com');
        $authority = new Group(null, null, null, null, null, array($user, $application));

        return new Statement('12345678-1234-5678-8234-567812345678', $actor, $verb, $activity, null, $authority);
    }

    private function createAgent()
    {
        return new Agent('mailto:christian@example.com', null, null, null, 'Christian');
    }
}
