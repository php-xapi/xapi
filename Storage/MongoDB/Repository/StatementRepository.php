<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface;
use Xabbuh\XApi\Storage\MongoDB\Document\Statement as StatementDocument;

/**
 * A MongoDB based statement repository.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementRepository extends DocumentRepository implements StatementRepositoryInterface
{
    /**
     * Saves a {@link Statement} in the underlying storage.
     *
     * @param Statement $statement The statement being stored
     * @param bool      $flush     Whether or not to flush the managed objects
     *                             (i.e. write them to the data storage)
     *
     * @return string The UUID of the created Statement
     */
    public function save(Statement $statement, $flush = true)
    {
        if (!$statement instanceof StatementDocument) {
            $statement = new StatementDocument($statement);
        }

        $this->getDocumentManager()->persist($statement);

        if ($flush) {
            $this->getDocumentManager()->flush();
        }

        return $this->cleanUpUuid($statement->getId());
    }

    private function cleanUpUuid($id)
    {
        if (strlen($id) !== 32) {
            return $id;
        }

        return sprintf('%s-%s-%s-%s-%s', substr($id, 0, 8), substr($id, 8, 4), substr($id, 12, 4), substr($id, 16, 4), substr($id, 20, 12));
    }
}
