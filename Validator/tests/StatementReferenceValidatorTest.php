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

use Xabbuh\XApi\Model\StatementReference;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementReferenceValidatorTest extends AbstractModelValidatorTest
{
    public function getObjectsToValidate()
    {
        echo 'TEST';
        $withStatementId = new StatementReference(md5(uniqid()));
        $withoutStatementId = new StatementReference(null);

        return array(
            array($withStatementId, 0),
            array($withoutStatementId, 1),
        );
    }
}
