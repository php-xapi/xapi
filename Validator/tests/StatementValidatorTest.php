<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Validator\Tests;

use Xabbuh\XApi\DataFixtures\StatementFixtures;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        $validStatement = new Statement(
            '12345678-1234-5678-8234-567812345678',
            new Agent(),
            new Verb('the-verb-id'),
            new Activity()
        );

        $statementWithNonUuidId = new Statement(
            'foo',
            new Agent(),
            new Verb('the-verb-id'),
            new Activity()
        );

        return array(
            array(StatementFixtures::getMinimalStatement(), 0),
            array($validStatement, 0),
            array($statementWithNonUuidId, 1),
        );
    }
}
