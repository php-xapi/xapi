<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model;

/**
 * A reference to an existing {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementReference extends Object
{
    /**
     * @var string The id of the referenced Statement
     */
    protected $statementId;

    /**
     * Sets the id of the referenced Statement.
     *
     * @param string $statementId The id
     */
    public function setStatementId($statementId)
    {
        $this->statementId = $statementId;
    }

    /**
     * Returns the id of the referenced Statement.
     *
     * @return string The id
     */
    public function getStatementId()
    {
        return $this->statementId;
    }
}
