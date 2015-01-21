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
 * The object of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class Object
{
    /**
     * Checks if another object is equal.
     *
     * Two objects are equal if and only if all of their properties are equal.
     *
     * @param \Xabbuh\XApi\Model\Object $object The object to compare with
     *
     * @return bool True if the objects are equal, false otherwise
     */
    abstract public function equals(Object $object);
}
