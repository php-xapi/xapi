<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Account;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Group;

/**
 * Actor fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorFixtures
{
    /**
     * Loads an agent.
     *
     * @return Agent
     */
    public static function getAgent()
    {
        $agent = new Agent('mailto:christian@example.com', null, null, null, 'Christian');

        return $agent;
    }

    /**
     * Loads a group.
     *
     * @return Group
     */
    public static function getGroup()
    {
        $account = new Account('GroupAccount', 'http://example.com/homePage');

        return static::createGroup('Example Group', $account);
    }

    /**
     * Loads a group that has no members.
     *
     * @return Group
     */
    public static function getGroupWithoutMembers()
    {
        $account = new Account('GroupAccount', 'http://example.com/homePage');

        return new Group(null, null, null, $account, 'Example Group');
    }

    /**
     * Loads an anonymous group.
     *
     * @return Group
     */
    public static function getAnonymousGroup()
    {
        return static::createGroup('Anonymous Group');
    }

    private static function createGroup($name, Account $account = null)
    {
        $memberAccount = new Account('Member of a group', 'http://example.com/account');
        $agent1 = new Agent('mailto:andrew@example.com', null, null, $memberAccount, 'Andrew Downes');
        $agent2 = new Agent(null, null, 'aaron.openid.example.org', null, 'Aaron Silvers');
        $group = new Group(null, null, null, $account, $name, array($agent1, $agent2));

        return $group;
    }
}
