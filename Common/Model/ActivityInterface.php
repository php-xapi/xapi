<?php

/*
 * This file is part of the xAPI package.
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
interface ActivityInterface extends ObjectInterface
{
    /**
     * Sets this Activity's unique identifier.
     *
     * @param string $id The identifier
     */
    public function setId($id);

    /**
     * Returns the Activity's unique identifier.
     *
     * @return string The identifier
     */
    public function getId();

    /**
     * Sets the Activity's {@link DefinitionInterface Definition}.
     *
     * @param \Xabbuh\XApi\Common\Model\DefinitionInterface $definition The definition
     */
    public function setDefinition(DefinitionInterface $definition);

    /**
     * Returns the Activity's {@link DefinitionInterface Definition}.
     *
     * @return \Xabbuh\XApi\Common\Model\DefinitionInterface The Definition
     */
    public function getDefinition();
}
