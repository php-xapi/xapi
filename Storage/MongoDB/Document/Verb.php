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

use Xabbuh\XApi\Model\Verb as BaseVerb;

/**
 * A {@link BaseVerb verb} mapped to a MongoDB document.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Verb extends BaseVerb
{
    /**
     * @var string The document identifier
     */
    protected $identifier;

    /**
     * Returns the unique identifier.
     *
     * @return string The identifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
