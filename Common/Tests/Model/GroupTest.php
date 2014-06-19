<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\GroupInterface;
use Xabbuh\XApi\Common\Test\Fixture\ActorFixtures;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class GroupTest extends ModelTest
{
    public function testValidateAnonymousGroup()
    {
        $group = ActorFixtures::getAnonymousGroup();

        $this->validateGroup($group, 'anonymous', 0);
    }

    public function testValidateIdentifiedGroup()
    {
        $group = ActorFixtures::getGroup();

        $this->validateGroup($group, 'identified', 0);
    }

    private function validateGroup(GroupInterface $group, $validationGroup, $validationCount)
    {
        $this->assertEquals(
            $validationCount,
            $this->validator->validate($group, array($validationGroup))->count()
        );
    }
}
