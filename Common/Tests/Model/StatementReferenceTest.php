<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\StatementReference;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementReferenceTest extends ModelTest
{
    public function testValidationWithStatementId()
    {
        $statementReference = new StatementReference();
        $statementReference->setStatementId(md5(uniqid()));

        $this->assertEquals(0, $this->validator->validate($statementReference)->count());
    }

    public function testValidationWithoutStatementId()
    {
        $statementReference = new StatementReference();

        $this->assertEquals(1, $this->validator->validate($statementReference)->count());
    }
}
