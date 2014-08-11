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
        $validStatement = new Statement();
        $validStatement->setId('12345678-1234-5678-8234-567812345678');
        $validStatement->setActor(new Agent());
        $validStatement->setVerb(new Verb());
        $validStatement->setObject(new Activity());

        $statementWithoutId = new Statement();
        $statementWithoutId->setActor(new Agent());
        $statementWithoutId->setVerb(new Verb());
        $statementWithoutId->setObject(new Activity());

        $statementWithNonUuidId = new Statement();
        $statementWithNonUuidId->setId('foo');
        $statementWithNonUuidId->setActor(new Agent());
        $statementWithNonUuidId->setVerb(new Verb());
        $statementWithNonUuidId->setObject(new Activity());

        $statementWithoutActor = new Statement();
        $statementWithoutActor->setId('12345678-1234-5678-8234-567812345678');
        $statementWithoutActor->setVerb(new Verb());
        $statementWithoutActor->setObject(new Activity());

        $statementWithoutVerb = new Statement();
        $statementWithoutVerb->setId('12345678-1234-5678-8234-567812345678');
        $statementWithoutVerb->setActor(new Agent());
        $statementWithoutVerb->setObject(new Activity());

        $statementWithoutObject = new Statement();
        $statementWithoutObject->setId('12345678-1234-5678-8234-567812345678');
        $statementWithoutObject->setActor(new Agent());
        $statementWithoutObject->setVerb(new Verb());

        return array(
            array(StatementFixtures::getMinimalStatement(), 0),
            array($validStatement, 0),
            array($statementWithoutId, 1),
            array($statementWithNonUuidId, 1),
            array($statementWithoutActor, 1),
            array($statementWithoutVerb, 1),
            array($statementWithoutObject, 1),
        );
    }
}
