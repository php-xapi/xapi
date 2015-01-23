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
use Xabbuh\XApi\Model\DocumentData;

/**
 * Serialize and deserialize {@link Document documents}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class DocumentDataSerializer implements DocumentDataSerializerInterface
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
    public function serializeDocumentData(DocumentData $data)
    {
        return $this->serializer->serialize($data, 'json');
    }

    /**
     * {@inheritDoc}
     */
    public function deserializeDocumentData($data)
    {
        return $this->serializer->deserialize($data, 'Xabbuh\XApi\Model\DocumentData', 'json');
    }
}
