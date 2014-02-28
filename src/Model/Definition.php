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

/**
 * Definition of an {@link ActivityInterface Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Definition implements DefinitionInterface
{
    /**
     * The human readable activity name
     * @var array
     */
    protected $name;

    /**
     * The human readable activity description
     * @var array
     */
    protected $description;

    /**
     * The type of the {@link ActivityInterface Activity}
     * @var string
     */
    protected $type;

    /**
     * {@inheritDoc}
     */
    public function setName(array $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription(array $description)
    {
        $this->description = $description;
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritDoc}
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {
        return $this->type;
    }
}
