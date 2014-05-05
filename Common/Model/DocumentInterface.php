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
 * An xAPI document.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface DocumentInterface extends \ArrayAccess
{
    /**
     * Returns the document's data.
     *
     * @return array The data
     */
    public function getData();
}
