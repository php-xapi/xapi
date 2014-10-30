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
        $agent = new Agent();
        $agent->setName('Christian');
        $agent->setMbox('mailto:christian@example.com');

        return $agent;
    }

    /**
     * Loads a group.
     *
     * @return Group
     */
    public static function getGroup()
    {
        $group = static::getAnonymousGroup();
        $group->setName('Example Group');
        $account = new Account();
        $account->setHomePage('http://example.com/homePage');
        $account->setName('GroupAccount');
        $group->setAccount($account);

        return $group;
    }

    /**
     * Loads an anonymous group.
     *
     * @return Group
     */
    public static function getAnonymousGroup()
    {
        $group = new Group();
        $group->setName('Anonymous Group');

        $agent1 = new Agent();
        $agent1->setName('Andrew Downes');
        $agent1->setMbox('mailto:andrew@example.com');
        $agent2 = new Agent();
        $agent2->setName('Aaron Silvers');
        $agent2->setOpenId('aaron.openid.example.org');
        $group->setMembers(array($agent1, $agent2));

        return $group;
    }
}
