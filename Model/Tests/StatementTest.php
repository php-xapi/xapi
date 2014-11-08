<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model\Tests;

use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Agent;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends \PHPUnit_Framework_TestCase
{
    public function testGetStatementReference()
    {
        $statement = new Statement(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            new Agent(),
            new Verb('the-verb-id'),
            new Activity()
        );
        $statementReference = $statement->getStatementReference();

        $this->assertInstanceOf('\Xabbuh\XApi\Model\StatementReference', $statementReference);
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }

    public function testGetVoidStatement()
    {
        $actor = new Agent('mailto:xapi@adlnet.gov');
        $statement = new Statement(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $actor,
            new Verb('verb-id'),
            new Activity()
        );
        $voidStatement = $statement->getVoidStatement($actor);

        /** @var \Xabbuh\XApi\Model\StatementReference $statementReference */
        $statementReference = $voidStatement->getObject();

        $this->assertEquals($actor, $voidStatement->getActor());
        $this->assertTrue($voidStatement->getVerb()->isVoidVerb());
        $this->assertInstanceOf('\Xabbuh\XApi\Model\StatementReference', $statementReference);
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }
}
