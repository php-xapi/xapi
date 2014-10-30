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

use JMS\Serializer\SerializerInterface;
use Xabbuh\XApi\Model\Document;

/**
 * Serialize and deserialize {@link Document documents}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentSerializer implements DocumentSerializerInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function serializeDocument(Document $document)
    {
        return $this->serializer->serialize($document, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeActivityProfileDocument($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\ActivityProfileDocument', 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeAgentProfileDocument($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\AgentProfileDocument', 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeStateDocument($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\StateDocument', 'json');
    }
}
