<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Storage\Api\Mapping;

use Xabbuh\XApi\Model\Verb;

/**
 * A {@link Verb} mapped to a storage backend.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class MappedVerb
{
    public $identifier;
    public $id;
    public $display;

    public function getModel()
    {
        return new Verb($this->id, $this->display);
    }

    public static function createFromModel(Verb $verb)
    {
        $mappedVerb = new MappedVerb();
        $mappedVerb->id = $verb->getId();
        $mappedVerb->display = $verb->getDisplay();

        return $mappedVerb;
    }
}
