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

use Xabbuh\XApi\DataFixtures\ActorFixtures;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class GroupValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        return array(
            array(ActorFixtures::getAnonymousGroup(), 0, array('anonymous')),
            array(ActorFixtures::getGroup(), 0, array('identified')),
        );
    }
}
