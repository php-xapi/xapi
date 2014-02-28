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

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorTest extends ModelTest
{
    public function testDeserializeAgent()
    {
        $actor = $this->deserialize($this->loadFixture('agent'));

        $this->assertInstanceOf('\Xabbuh\XApiCommon\Model\Agent', $actor);
    }

    public function testDeserializeGroup()
    {
        $actor = $this->deserialize($this->loadFixture('group'));

        $this->assertInstanceOf('\Xabbuh\XApiCommon\Model\Group', $actor);
    }
}
