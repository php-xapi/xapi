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
use Rhumsaa\Uuid\Uuid;
use Xabbuh\XApi\Model\Statement;
use Xabbuh\XApi\Storage\Doctrine\Repository\StatementRepositoryInterface;
use Xabbuh\XApi\Storage\MongoDB\Document\Statement as StatementDocument;
use Xabbuh\XApi\Storage\MongoDB\Document\Verb;

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
        $uuid = $statement->getId();

        if (null === $uuid) {
            $uuid = Uuid::uuid4()->toString();
        }

        $actor = $statement->getActor();
        $verb = new Verb($statement->getVerb()->getId(), $statement->getVerb()->getDisplay());
        $object = $statement->getObject();
        $result = $statement->getResult();
        $statement = new StatementDocument($uuid, $actor, $verb, $object, $result);

        $this->getDocumentManager()->persist($statement);

        if ($flush) {
            $this->getDocumentManager()->flush();
        }

        return $statement->getId();
    }
}
