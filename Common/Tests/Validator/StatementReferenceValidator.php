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

use Xabbuh\XApi\Model\StatementReference;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementReferenceValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        $withStatementId = new StatementReference();
        $withStatementId->setStatementId(md5(uniqid()));
        $withoutStatementId = new StatementReference();

        return array(
            array($withStatementId, 0),
            array($withoutStatementId, 1),
        );
    }
}
