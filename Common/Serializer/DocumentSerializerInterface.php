<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Serializer;

use Xabbuh\XApi\Model\DocumentInterface;

/**
 * Serialize and deserialize {@link DocumentInterface documents}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface DocumentSerializerInterface
{
    /**
     * Serializes a document into a JSON encoded string.
     *
     * @param DocumentInterface $document The document to serialize
     *
     * @return string The serialized document
     */
    public function serializeDocument(DocumentInterface $document);

    /**
     * Parses a serialized activity profile document.
     *
     * @param string $data The serialized activity profile document
     *
     * @return DocumentInterface The parsed activity profile document
     */
    public function deserializeActivityProfileDocument($data);

    /**
     * Parses a serialized agent profile document.
     *
     * @param string $data The serialized agent profile document
     *
     * @return DocumentInterface The parsed agent profile document
     */
    public function deserializeAgentProfileDocument($data);

    /**
     * Parses a serialized state document.
     *
     * @param string $data The serialized state document
     *
     * @return DocumentInterface The parsed state document
     */
    public function deserializeStateDocument($data);
}
