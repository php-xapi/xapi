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

use Xabbuh\XApi\DataFixtures\ActorFixtures;
use Xabbuh\XApi\Model\Account;
use Xabbuh\XApi\Model\Actor;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Group;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorTest extends \PHPUnit_Framework_TestCase
{
    public function testActorsEqualWhenAllPropertiesAreEqual()
    {
        $agent1 = ActorFixtures::getAgent();
        $agent2 = ActorFixtures::getAgent();

        $this->assertTrue($agent1->equals($agent2));

        $group1 = ActorFixtures::getGroup();
        $group2 = ActorFixtures::getGroup();

        $this->assertTrue($group1->equals($group2));
    }

    public function testAgentAndGroupDoNotEqual()
    {
        $agent = ActorFixtures::getAgent();
        $group = ActorFixtures::getGroup();

        $this->assertFalse($agent->equals($group));
        $this->assertFalse($group->equals($agent));
    }

    /**
     * @dataProvider getActorsWithDifferingInverseFunctionalIdentifiers
     */
    public function testActorsDifferWhenInverseFunctionalIdentifierDiffer(Actor $actor1, Actor $actor2)
    {
        $this->assertFalse($actor1->equals($actor2));
    }

    public function getActorsWithDifferingInverseFunctionalIdentifiers()
    {
        return array(
            'agent-and-group' => array(
                new Agent(),
                new Group(),
            ),
            'group-and-agent' => array(
                new Group(),
                new Agent(),
            ),
            'agents-with-different-mboxes' => array(
                new Agent('christian@example.com'),
                new Agent('bob@example.com'),
            ),
            'groups-with-different-mboxes' => array(
                new Group('christian@example.com'),
                new Group('bob@example.com'),
            ),
            'agents-with-different-mbox-hashsums' => array(
                new Agent(null, 'foo'),
                new Agent(null, 'bar'),
            ),
            'groups-with-different-mbox-hashsums' => array(
                new Group(null, 'foo'),
                new Group(null, 'bar'),
            ),
            'agents-with-different-openids' => array(
                new Agent(null, null, 'aaron.openid.example.org'),
                new Agent(null, null, 'bob.openid.example.org'),
            ),
            'groups-with-different-openids' => array(
                new Group(null, null, 'aaron.openid.example.org'),
                new Group(null, null, 'bob.openid.example.org'),
            ),
            'agents-with-first-account-null' => array(
                new Agent(null, null, null, null),
                new Agent(null, null, null, new Account('user account', 'http://example.com/bob')),
            ),
            'agents-with-other-account-null' => array(
                new Agent(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Agent(null, null, null, null),
            ),
            'groups-with-first-account-null' => array(
                new Group(null, null, null, null),
                new Group(null, null, null, new Account('user account', 'http://example.com/bob')),
            ),
            'groups-with-other-account-null' => array(
                new Group(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Group(null, null, null, null),
            ),
            'agents-with-different-account-names' => array(
                new Agent(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Agent(null, null, null, new Account('another user account', 'http://example.com/bob')),
            ),
            'agents-with-different-account-home-pages' => array(
                new Agent(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Agent(null, null, null, new Account('user account', 'http://example.com/christian')),
            ),
            'groups-with-different-account-names' => array(
                new Group(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Group(null, null, null, new Account('another user account', 'http://example.com/bob')),
            ),
            'groups-with-different-account-home-pages' => array(
                new Group(null, null, null, new Account('user account', 'http://example.com/bob')),
                new Group(null, null, null, new Account('user account', 'http://example.com/christian')),
            ),
            'agents-with-different-names' => array(
                new Agent(null, null, null, null, 'Christian'),
                new Agent(null, null, null, null, 'Bob'),
            ),
            'groups-with-different-names' => array(
                new Group(null, null, null, null, 'Christian'),
                new Group(null, null, null, null, 'Bob'),
            ),
            'groups-with-different-number-of-members' => array(
                new Group(null, null, null, null, null, array(
                    $this->createAgent1(),
                    $this->createAgent2(),
                    $this->createAgent3(),
                )),
                new Group(null, null, null, null, null, array(
                    $this->createAgent1(),
                    $this->createAgent3(),
                )),
            ),
            'groups-with-different-members' => array(
                new Group(null, null, null, null, null, array(
                    $this->createAgent1(),
                    $this->createAgent2(),
                )),
                new Group(null, null, null, null, null, array(
                    $this->createAgent1(),
                    $this->createAgent3(),
                )),
            ),
        );
    }

    private function createAgent1()
    {
        return new Agent('mailto:andrew@example.com', null, null, null, 'Andrew Downes');
    }

    private function createAgent2()
    {
        return new Agent(null, null, 'aaron.openid.example.org', null, 'Aaron Silvers');
    }

    private function createAgent3()
    {
        return new Agent('mailto:christian@example.com', null, null, null, 'Christian');
    }
}
