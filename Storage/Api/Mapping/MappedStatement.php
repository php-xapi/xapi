<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api\Mapping;

use Xabbuh\XApi\Model\Statement;

/**
 * A {@link Statement} mapped to a storage backend.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class MappedStatement
{
    public $id;
    public $actor;
    public $verb;
    public $object;
    public $result;

    public function getModel()
    {
        return new Statement($this->id, $this->actor, $this->verb->getModel(), $this->object, $this->result);
    }

    public static function createFromModel(Statement $statement)
    {
        $mappedStatement = new MappedStatement();
        $mappedStatement->id = $statement->getId();
        $mappedStatement->actor = $statement->getActor();
        $mappedStatement->verb = MappedVerb::createFromModel($statement->getVerb());
        $mappedStatement->object = $statement->getObject();
        $mappedStatement->result = $statement->getResult();

        return $mappedStatement;
    }
}
