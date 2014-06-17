<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api;

/**
 * Base statement manager class.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class StatementManager implements StatementManagerInterface
{
    /**
     * {@inheritDoc}
     */
    public function findStatementById($statementId)
    {
        return $this->findStatementBy(array('id' => $statementId));
    }
}
