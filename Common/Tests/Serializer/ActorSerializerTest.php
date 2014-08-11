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

use Xabbuh\XApi\Common\Serializer\ActorSerializer;
use Xabbuh\XApi\Common\Tests\Fixtures\ActorJsonFixtures;
use Xabbuh\XApi\DataFixtures\ActorFixtures;

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
        $actor = $this->actorSerializer->deserializeActor(ActorJsonFixtures::getAgent());

        $this->assertInstanceOf('\Xabbuh\XApi\Model\Agent', $actor);
        $this->assertEquals('Christian', $actor->getName());
        $this->assertEquals('mailto:christian@example.com', $actor->getMbox());
    }

    public function testDeserializeAgentWithoutObjectType()
    {
        $actor = $this->actorSerializer->deserializeActor(ActorJsonFixtures::getAgentWithoutObjectType());

        $this->assertInstanceOf('\Xabbuh\XApi\Model\Agent', $actor);
    }

    public function testDeserializeGroup()
    {
        /** @var \Xabbuh\XApi\Model\Group $group */
        $group = $this->actorSerializer->deserializeActor(ActorJsonFixtures::getGroup());

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
        $agent = ActorFixtures::getAgent();

        $this->assertJsonEquals(
            ActorJsonFixtures::getAgent(),
            $this->actorSerializer->serializeActor($agent)
        );
    }

    public function testSerializeGroup()
    {
        $group = ActorFixtures::getGroup();

        $this->assertJsonEquals(
            ActorJsonFixtures::getGroup(),
            $this->actorSerializer->serializeActor($group)
        );
    }
}
