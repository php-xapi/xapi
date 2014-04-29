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
 * An Activity in a {@StatementInterface}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Activity extends Object implements ActivityInterface
{
    /**
     * The Activity's unique identifier
     * @var string
     */
    protected $id;

    /**
     * The Activity's {@link DefinitionInterface Definition}
     * @var \Xabbuh\XApi\Common\Model\DefinitionInterface
     */
    protected $definition;

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setDefinition(DefinitionInterface $definition)
    {
        $this->definition = $definition;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}
