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

use Xabbuh\XApi\Common\Model\Account;
use Xabbuh\XApi\Common\Model\Agent;
use Xabbuh\XApi\Common\Model\Group;
use Xabbuh\XApi\Common\Serializer\ActorSerializer;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorSerializerTest extends AbstractSerializerTest
{
    /**
     * @var ActorSerializer
     */
    private $actorSerializer;

    protected function setUp()
    {
        parent::setUp();
        $this->actorSerializer = new ActorSerializer($this->serializer);
    }

    public function testDeserializeAgent()
    {
        $actor = $this->actorSerializer->deserializeActor($this->loadFixture('agent'));

        $this->assertInstanceOf('\Xabbuh\XApi\Common\Model\Agent', $actor);
        $this->assertEquals('Christian', $actor->getName());
        $this->assertEquals('mailto:christian@example.com', $actor->getMbox());
    }

    public function testDeserializeAgentWithoutObjectType()
    {
        $actor = $this->actorSerializer->deserializeActor($this->loadFixture('agent_without_object_type'));

        $this->assertInstanceOf('\Xabbuh\XApi\Common\Model\Agent', $actor);
    }

    public function testDeserializeGroup()
    {
        /** @var \Xabbuh\XApi\Common\Model\Group $group */
        $group = $this->actorSerializer->deserializeActor($this->loadFixture('group'));

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

    public function testSerializeAgent()
    {
        $agent = new Agent();
        $agent->setName('Christian');
        $agent->setMbox('mailto:christian@example.com');

        $this->assertJsonEquals(
            $this->loadFixture('agent'),
            $this->actorSerializer->serializeActor($agent)
        );
    }

    public function testSerializeGroup()
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

        $this->assertJsonEquals(
            $this->loadFixture('group'),
            $this->actorSerializer->serializeActor($group)
        );
    }
}
