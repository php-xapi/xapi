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
 * An Activity in a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Activity extends Object
{
    /**
     * The Activity's unique identifier
     * @var string
     */
    protected $id;

    /**
     * @var Definition The Activity's {@link Definition}
     */
    protected $definition;

    /**
     * Sets this Activity's unique identifier.
     *
     * @param string $id The identifier
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the Activity's unique identifier.
     *
     * @return string The identifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the Activity's {@link Definition}.
     *
     * @param Definition $definition The definition
     */
    public function setDefinition(Definition $definition)
    {
        $this->definition = $definition;
    }

    /**
     * Returns the Activity's {@link Definition}.
     *
     * @return Definition The Definition
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}
