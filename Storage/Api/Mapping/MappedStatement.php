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

use Xabbuh\XApi\Model\Actor;
use Xabbuh\XApi\Model\Result;
use Xabbuh\XApi\Model\Statement;

/**
 * A {@link Statement} mapped to a storage backend.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class MappedStatement
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var Actor
     */
    public $actor;

    /**
     * @var MappedVerb
     */
    public $verb;

    /**
     * @var \Xabbuh\XApi\Model\Object
     */
    public $object;

    /**
     * @var Result
     */
    public $result;

    /**
     * @var Actor
     */
    public $authority;

    /**
     * @var \DateTime
     */
    public $created;

    /**
     * @var \DateTime
     */
    public $stored;

    public function getModel()
    {
        return new Statement($this->id, $this->actor, $this->verb->getModel(), $this->object, $this->result, $this->authority, $this->created, $this->stored);
    }

    public static function createFromModel(Statement $statement)
    {
        $mappedStatement = new MappedStatement();
        $mappedStatement->id = $statement->getId();
        $mappedStatement->actor = $statement->getActor();
        $mappedStatement->verb = MappedVerb::createFromModel($statement->getVerb());
        $mappedStatement->object = $statement->getObject();
        $mappedStatement->result = $statement->getResult();
        $mappedStatement->authority = $statement->getAuthority();
        $mappedStatement->created = $statement->getCreated();
        $mappedStatement->stored = $statement->getStored();

        return $mappedStatement;
    }
}
