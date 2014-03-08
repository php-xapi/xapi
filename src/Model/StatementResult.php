<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * Result when querying a Learning Record Store (LRS) for a list of
 * {@link StatementInterface Statements}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementResult implements StatementResultInterface
{
    /**
     * The collection of Statements
     * @var StatementInterface[]
     */
    protected $statements;

    /**
     * {@inheritDoc}
     */
    public function setStatements(array $statements)
    {
        $this->statements = $statements;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatements()
    {
        return $this->statements;
    }
}
