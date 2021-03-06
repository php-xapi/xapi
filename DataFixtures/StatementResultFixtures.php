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
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\StatementResult;
use Xabbuh\XApi\Model\Verb;

/**
 * Statement result fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResultFixtures
{
    /**
     * Loads a statement result.
     *
     * @param string $urlPath An optional URL path refering to more results
     *
     * @return StatementResult
     */
    public static function getStatementResult($urlPath = null)
    {
        $statement1 = StatementFixtures::getMinimalStatement();

        $verb = new Verb('http://adlnet.gov/expapi/verbs/deleted', array('en-US' => 'deleted'));
        $statement2 = new Statement(
            '12345678-1234-5678-8234-567812345679',
            new Agent('mailto:bob@example.com'),
            $verb,
            $statement1->getObject()
        );

        $statementResult = new StatementResult(array($statement1, $statement2), $urlPath);

        return $statementResult;
    }

    /**
     * Loads a statement result including a more reference.
     *
     * @return StatementResult
     */
    public static function getStatementResultWithMore()
    {
        $statementResult = static::getStatementResult('/xapi/statements/more/b381d8eca64a61a42c7b9b4ecc2fabb6');

        return $statementResult;
    }
}
