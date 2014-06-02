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

use Xabbuh\XApi\Common\Model\Account;
use Xabbuh\XApi\Common\Model\Agent;
use Xabbuh\XApi\Common\Model\Group;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class GroupTest extends ModelTest
{
    public function testValidateAnonymousGroup()
    {
        $group = $this->loadAndParseFixture('anonymous_group');

        $this->validateGroup($group, 'anonymous', 0);
    }

    public function testValidateIdentifiedGroup()
    {
        $group = $this->loadAndParseFixture('group');

        $this->validateGroup($group, 'identified', 0);
    }

    private function validateGroup(Group $group, $validationGroup, $validationCount)
    {
        $this->assertEquals(
            $validationCount,
            $this->validator->validate($group, array($validationGroup))->count()
        );
    }
}
