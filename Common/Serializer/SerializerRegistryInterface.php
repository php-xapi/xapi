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

/**
 * Registry containing all the serializers.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface SerializerRegistryInterface
{
    /**
     * Sets the {@link StatementSerializerInterface statement serializer}.
     *
     * @param StatementSerializerInterface $serializer The serializer
     */
    public function setStatementSerializer(StatementSerializerInterface $serializer);

    /**
     * Returns the {@link StatementSerializerInterface statement serializer}.
     *
     * @return StatementSerializerInterface The serializer
     */
    public function getStatementSerializer();

    /**
     * Sets the {@link StatementResultSerializerInterface statement result serializer}.
     *
     * @param StatementResultSerializerInterface $serializer The serializer
     */
    public function setStatementResultSerializer(StatementResultSerializerInterface $serializer);

    /**
     * Returns the {@link StatementResultSerializerInterface statement result serializer}.
     *
     * @return StatementResultSerializerInterface The serializer
     */
    public function getStatementResultSerializer();

    /**
     * Sets the {@link ActorSerializerInterface actor serializer}.
     *
     * @param ActorSerializerInterface $serializer The serializer
     */
    public function setActorSerializer(ActorSerializerInterface $serializer);

    /**
     * Returns the {@link ActorSerializerInterface actor serializer}.
     *
     * @return ActorSerializerInterface The serializer
     */
    public function getActorSerializer();

    /**
     * Sets the {@link DocumentSerializerInterface document serializer}.
     *
     * @param DocumentSerializerInterface $serializer The serializer
     */
    public function setDocumentSerializer(DocumentSerializerInterface $serializer);

    /**
     * Returns the {@link DocumentSerializerInterface document serializer}.
     *
     * @return DocumentSerializerInterface The serializer
     */
    public function getDocumentSerializer();
}
