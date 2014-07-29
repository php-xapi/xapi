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

use Xabbuh\XApi\Common\Model\Activity;
use Xabbuh\XApi\Common\Model\ActivityInterface;
use Xabbuh\XApi\DataFixtures\ActivityFixtures;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityTest extends ModelTest
{
    public function testValidateActivity()
    {
        $activity = ActivityFixtures::getActivity();

        $this->validateActivity($activity, 0);
    }

    public function testValidateActivityWithoutId()
    {
        $activity = new Activity();

        $this->validateActivity($activity, 1);
    }

    private function validateActivity(ActivityInterface $activity, $violationCount)
    {
        $this->assertEquals(
            $violationCount,
            $this->validator->validate($activity)->count()
        );
    }
}
