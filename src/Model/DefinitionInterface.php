<?php
/*
* This file is part of the XabbuhLRSBundle package.
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
interface DefinitionInterface
{
    /**
     * Sets human readable names.
     *
     * @param array $name The name language map
     */
    public function setName(array $name);

    /**
     * Returns the human readable names.
     *
     * @return array The name language map
     */
    public function getName();

    /**
     * Sets human readable descriptions.
     *
     * @param array $description The description language map
     */
    public function setDescription(array $description);

    /**
     * Returns the human readable descriptions.
     *
     * @return array The description language map
     */
    public function getDescription();

    /**
     * Sets the {@link ActivityInterface} type.
     *
     * @param string $type The type
     */
    public function setType($type);

    /**
     * Returns the {@link ActivityInterface} type.
     *
     * @return string The type
     */
    public function getType();
}
