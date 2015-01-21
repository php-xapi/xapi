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
    private $statementId;

    /**
     * @param string $statementId
     */
    public function __construct($statementId)
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

    /**
     * {@inheritdoc}
     */
    public function equals(Object $object)
    {
        if ('Xabbuh\XApi\Model\StatementReference' !== get_class($object)) {
            return false;
        }

        /** @var StatementReference $object */

        return $this->statementId === $object->statementId;
    }
}
