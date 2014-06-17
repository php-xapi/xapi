<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\MongoDB\Document;

use Xabbuh\XApi\Common\Model\Statement as BaseStatement;
use Xabbuh\XApi\Common\Model\StatementInterface;

/**
 * A {@link StatementInterface statement} mapped to a MongoDB document.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Statement extends BaseStatement
{
    public function __construct(StatementInterface $statement)
    {
        $this->id = $statement->getId();
        $this->verb = new Verb($statement->getVerb());
        $this->actor = $statement->getActor();
        $this->object = $statement->getObject();
        $this->result = $statement->getResult();
    }
}
