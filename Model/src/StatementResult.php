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
     * @var string
     */
    protected $moreUrlPath;

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

    /**
     * {@inheritDoc}
     */
    public function setMoreUrlPath($urlPath)
    {
        $this->moreUrlPath = $urlPath;
    }

    /**
     * {@inheritDoc}
     */
    public function getMoreUrlPath()
    {
        return $this->moreUrlPath;
    }
}
