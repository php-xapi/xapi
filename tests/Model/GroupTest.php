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

use Xabbuh\XApiCommon\Model\Account;
use Xabbuh\XApiCommon\Model\Agent;
use Xabbuh\XApiCommon\Model\Group;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class GroupTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApiCommon\Model\Group $group */
        $group = $this->deserialize($this->loadFixture('group'));

        $this->assertEquals('Example Group', $group->getName());
        $this->assertEquals('http://example.com/homePage', $group->getAccount()->getHomePage());
        $this->assertEquals('GroupAccount', $group->getAccount()->getName());

        $members = $group->getMembers();
        $this->assertEquals(2, count($members));

        $this->assertEquals('Andrew Downes', $members[0]->getName());
        $this->assertEquals('mailto:andrew@example.com', $members[0]->getMbox());

        $this->assertEquals('Aaron Silvers', $members[1]->getName());
        $this->assertEquals('aaron.openid.example.org', $members[1]->getOpenId());
    }

    public function testSerialize()
    {
        $group = new Group();
        $group->setName('Example Group');

        $account = new Account();
        $account->setHomePage('http://example.com/homePage');
        $account->setName('GroupAccount');
        $group->setAccount($account);

        $agent1 = new Agent();
        $agent1->setName('Andrew Downes');
        $agent1->setMbox('mailto:andrew@example.com');
        $agent2 = new Agent();
        $agent2->setName('Aaron Silvers');
        $agent2->setOpenId('aaron.openid.example.org');
        $group->setMembers(array($agent1, $agent2));

        $this->serializeAndValidateData($this->loadFixture('group'), $group);
    }
}
