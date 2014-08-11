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

use Xabbuh\XApi\Model\StatementResult;

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
     * @return \Xabbuh\XApi\Model\StatementResultInterface
     */
    public static function getStatementResult()
    {
        $statement1 = StatementFixtures::getMinimalStatement();

        $statement2 = StatementFixtures::getMinimalStatement();
        $statement2->setId('12345678-1234-5678-8234-567812345679');
        $statement2->getActor()->setMbox('mailto:bob@example.com');
        $statement2->getVerb()->setId('http://adlnet.gov/expapi/verbs/deleted');
        $statement2->getVerb()->setDisplay(array('en-US' => 'deleted'));

        $statementResult = new StatementResult();
        $statementResult->setStatements(array($statement1, $statement2));

        return $statementResult;
    }

    /**
     * Loads a statement result including a more reference.
     *
     * @return \Xabbuh\XApi\Model\StatementResultInterface
     */
    public static function getStatementResultWithMore()
    {
        $statementResult = static::getStatementResult();
        $statementResult->setMoreUrlPath('/xapi/statements/more/b381d8eca64a61a42c7b9b4ecc2fabb6');

        return $statementResult;
    }
}
