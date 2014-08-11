<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Validator;

use Xabbuh\XApi\DataFixtures\ActivityFixtures;
use Xabbuh\XApi\Model\Activity;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        return array(
            array(ActivityFixtures::getActivity(), 0),
            array(new Activity(), 1),
        );
    }
}
