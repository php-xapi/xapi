<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Serializer;

use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializerBuilder;
use Xabbuh\XApi\Common\Serializer\Event\ActorEventSubscriber;
use Xabbuh\XApi\Common\Serializer\Event\ObjectEventSubscriber;
use Xabbuh\XApi\Common\Serializer\Event\SetSerializedTypeEventSubscriber;

/**
 * Entry point to setup the {@link \JMS\Serializer\Serializer JMS Serializer}
 * for the Experience API.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Serializer
{
    /**
     * Returns the directory containing the Serializer metadata.
     *
     * @return string The metadata directory
     */
    public static function getMetadataDirectory()
    {
        return __DIR__.'/../metadata/serializer';
    }

    /**
     * Registers serialization metadata for the xAPI models on a SerializerBuilder.
     *
     * @param SerializerBuilder $builder The SerializerBuilder
     */
    public static function registerXApiMetadata(SerializerBuilder $builder)
    {
        $builder->addMetadataDir(static::getMetadataDirectory(), 'Xabbuh\XApi\Common\Model');
    }

    /**
     * Registers event subscribers for the xAPI models on a SerializerBuilder.
     *
     * @param SerializerBuilder $builder The SerializerBuilder
     */
    public static function registerXApiEventSubscriber(SerializerBuilder $builder)
    {
        $builder->configureListeners(function (EventDispatcher $dispatcher) {
            $dispatcher->addSubscriber(new ActorEventSubscriber());
            $dispatcher->addSubscriber(new ObjectEventSubscriber());
            $dispatcher->addSubscriber(new SetSerializedTypeEventSubscriber());
        });
    }

    /**
     * Registers serialization metadata and event subscribers for the xAPI
     * models on a SerializerBuilder.
     *
     * @param SerializerBuilder $builder The SerializerBuilder
     */
    public static function registerXApi(SerializerBuilder $builder)
    {
        static::registerXApiMetadata($builder);
        static::registerXApiEventSubscriber($builder);
    }

    /**
     * Creates a SerializerBuilder with serialization metadata and serialization
     * event subscribers registered for the xAPI models.
     *
     * @return SerializerBuilder The SerializerBuilder
     */
    public static function createSerializerBuilder()
    {
        $builder = SerializerBuilder::create();
        static::registerXApiMetadata($builder);
        static::registerXApiEventSubscriber($builder);

        return $builder;
    }

    /**
     * Creates a new Serializer.
     *
     * @return \JMS\Serializer\SerializerInterface The Serializer
     */
    public static function createSerializer()
    {
        return static::createSerializerBuilder()->build();
    }
}
