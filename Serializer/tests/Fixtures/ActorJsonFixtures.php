<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Serializer\Tests\Fixtures;

/**
 * JSON encoded actor fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActorJsonFixtures extends JsonFixtures
{
    /**
     * Loads an agent.
     *
     * @return string
     */
    public static function getAgent()
    {
        return static::load('agent');
    }

    /**
     * Loads an agent without an object type reference included.
     *
     * @return string
     */
    public static function getAgentWithoutObjectType()
    {
        return static::load('agent_without_object_type');
    }

    /**
     * Loads a group.
     *
     * @return string
     */
    public static function getGroup()
    {
        return static::load('group');
    }

    /**
     * Loads an anonymous group.
     *
     * @return string
     */
    public static function getAnonymousGroup()
    {
        return static::load('anonymous_group');
    }
}
