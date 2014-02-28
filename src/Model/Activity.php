<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * An Activity in a {@StatementInterface}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Activity implements ActivityInterface
{
    /**
     * The Activity's unique identifier
     * @var string
     * @JMS\Type("string")
     */
    protected $id;

    /**
     * The Activity's {@link DefinitionInterface Definition}
     * @var \Xabbuh\XApiCommon\Model\DefinitionInterface
     * @JMS\Type("Xabbuh\XApiCommon\Model\Definition")
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
