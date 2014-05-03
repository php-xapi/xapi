<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * A reference to an existing {@link StatementInterface Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementReferenceInterface extends ObjectInterface
{
    /**
     * Sets the id of the referenced Statement.
     *
     * @param string $statementId The id
     */
    public function setStatementId($statementId);

    /**
     * Returns the id of the referenced Statement.
     *
     * @return string The id
     */
    public function getStatementId();
}
