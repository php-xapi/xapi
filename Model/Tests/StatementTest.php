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
        $statement = new Statement();
        $statement->setId('e05aa883-acaf-40ad-bf54-02c8ce485fb0');
        $statement->setActor(new Agent());
        $statement->setVerb(new Verb());
        $statementReference = $statement->getStatementReference();

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Model\StatementReferenceInterface',
            $statementReference
        );
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }

    public function testGetVoidStatement()
    {
        $statement = new Statement();
        $statement->setId('e05aa883-acaf-40ad-bf54-02c8ce485fb0');
        $actor = new Agent();
        $actor->setMbox('mailto:xapi@adlnet.gov');
        $voidStatement = $statement->getVoidStatement($actor);

        /** @var \Xabbuh\XApi\Model\StatementReferenceInterface $statementReference */
        $statementReference = $voidStatement->getObject();

        $this->assertEquals($actor, $voidStatement->getActor());
        $this->assertTrue($voidStatement->getVerb()->isVoidVerb());
        $this->assertInstanceOf(
            '\Xabbuh\XApi\Model\StatementReferenceInterface',
            $statementReference
        );
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }
}
