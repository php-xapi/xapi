<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Test\Fixture;

/**
 * JSON encoded statement fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementJsonFixtures extends JsonFixtures
{
    /**
     * Loads a minimal valid statement.
     *
     * @return string
     */
    public static function getMinimalStatement()
    {
        return static::load('minimal_statement');
    }

    /**
     * Loads a statement including a reference to another statement.
     *
     * @return string
     */
    public static function getStatementWithStatementRef()
    {
        return static::load('statement_with_statement_ref');
    }

    /**
     * Loads a statement including a result.
     *
     * @return string
     */
    public static function getStatementWithResult()
    {
        return static::load('statement_with_result');
    }

    /**
     * Loads a statement including a sub statement.
     *
     * @return string
     */
    public static function getStatementWithSubStatement()
    {
        return static::load('statement_with_sub_statement');
    }

    /**
     * Loads a collection of statements.
     *
     * @return string
     */
    public static function getStatementCollection()
    {
        return static::load('statement_collection');
    }
}
