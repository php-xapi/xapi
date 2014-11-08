<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Result;
use Xabbuh\XApi\Model\Score;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementReference;
use Xabbuh\XApi\Model\Verb;

/**
 * Statement fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementFixtures
{
    /**
     * Loads a minimal valid statement.
     *
     * @param string $id The id of the new Statement
     *
     * @return Statement
     */
    public static function getMinimalStatement($id = '12345678-1234-5678-8234-567812345678')
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $verb = new Verb('http://adlnet.gov/expapi/verbs/created', array('en-US' => 'created'));
        $activity = new Activity('http://example.adlnet.gov/xapi/example/activity');

        return new Statement($id, $actor, $verb, $activity);
    }

    /**
     * Loads a statement including a reference to another statement.
     *
     * @return Statement
     */
    public static function getStatementWithStatementRef()
    {
        $minimalStatement = static::getMinimalStatement();

        return new Statement(
            $minimalStatement->getId(),
            $minimalStatement->getActor(),
            $minimalStatement->getVerb(),
            new StatementReference('8f87ccde-bb56-4c2e-ab83-44982ef22df0')
        );
    }

    /**
     * Loads a statement including a result.
     *
     * @return Statement
     */
    public static function getStatementWithResult()
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $verb = new Verb('http://adlnet.gov/expapi/verbs/created', array('en-US' => 'created'));
        $activity = new Activity('http://example.adlnet.gov/xapi/example/activity');
        $score = new Score(0.95, 31, 0, 50);
        $result = new Result($score, true, true);

        return new Statement('12345678-1234-5678-8234-567812345678', $actor, $verb, $activity, $result);
    }
}
