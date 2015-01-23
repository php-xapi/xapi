<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Doctrine\Repository;

use Xabbuh\XApi\Storage\Api\Mapping\MappedStatement;

/**
 * {@link MappedStatement} repository interface definition.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface MappedStatementRepository
{
    /**
     * @param array $criteria
     *
     * @return MappedStatement The statement or null if no matching statement
     *                         has been found
     */
    public function findMappedStatement(array $criteria);

    /**
     * @param array $criteria
     *
     * @return MappedStatement[] The statements matching the given criteria
     */
    public function findMappedStatements(array $criteria);

    /**
     * Saves a {@link MappedStatement} in the underlying storage.
     *
     * @param MappedStatement $mappedStatement The statement being stored
     * @param bool            $flush           Whether or not to flush the managed
     *                                         objects (i.e. write them to the data
     *                                         storage immediately)
     */
    public function storeMappedStatement(MappedStatement $mappedStatement, $flush = true);
}
