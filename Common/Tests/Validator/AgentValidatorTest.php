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
use Xabbuh\XApi\Model\Agent;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AgentValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        return array(
            array(ActorFixtures::getAgent(), 0),
            array(new Agent(), 1),
        );
    }
}
