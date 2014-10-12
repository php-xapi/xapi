<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer;

use Xabbuh\XApi\Model\ActorInterface;

/**
 * Serialize and deserialize {@link ActorInterface actors}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface ActorSerializerInterface
{
    /**
     * Serializes an actor into a JSON encoded string.
     *
     * @param ActorInterface $actor The actor to serialize
     *
     * @return string The serialized actor
     */
    public function serializeActor(ActorInterface $actor);

    /**
     * Parses a serialized actor.
     *
     * @param string $data The serialized actor
     *
     * @return ActorInterface The parsed actor
     */
    public function deserializeActor($data);
}
