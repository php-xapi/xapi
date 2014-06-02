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

use Xabbuh\XApi\Common\Model\Activity;
use Xabbuh\XApi\Common\Model\Agent;
use Xabbuh\XApi\Common\Model\Statement;
use Xabbuh\XApi\Common\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementTest extends ModelTest
{
    public function testValidateMinimalStatement()
    {
        $statement = $this->loadAndParseFixture('minimal_statement');

        $this->validateStatement($statement, 0);
    }

    public function testValidStatement()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Agent());
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 0);
    }

    public function testWithoutId()
    {
        $statement = new Statement();
        $statement->setActor(new Agent());
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutActor()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setVerb(new Verb());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutVerb()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Agent());
        $statement->setObject(new Activity());

        $this->validateStatement($statement, 1);
    }

    public function testWithoutObject()
    {
        $statement = new Statement();
        $statement->setId(md5(uniqid()));
        $statement->setActor(new Agent());
        $statement->setVerb(new Verb());

        $this->validateStatement($statement, 1);
    }

    public function testGetStatementReference()
    {
        $statement = new Statement();
        $statement->setId('e05aa883-acaf-40ad-bf54-02c8ce485fb0');
        $statement->setActor(new Agent());
        $statement->setVerb(new Verb());
        $statementReference = $statement->getStatementReference();

        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\StatementReferenceInterface',
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

        /** @var \Xabbuh\XApi\Common\Model\StatementReferenceInterface $statementReference */
        $statementReference = $voidStatement->getObject();

        $this->assertEquals($actor, $voidStatement->getActor());
        $this->assertTrue($voidStatement->getVerb()->isVoidVerb());
        $this->assertInstanceOf(
            '\Xabbuh\XApi\Common\Model\StatementReferenceInterface',
            $statementReference
        );
        $this->assertEquals(
            'e05aa883-acaf-40ad-bf54-02c8ce485fb0',
            $statementReference->getStatementId()
        );
    }

    private function validateStatement(Statement $statement, $violationCount)
    {
        $this->assertEquals($violationCount, $this->validator->validate($statement)->count());
    }
}
