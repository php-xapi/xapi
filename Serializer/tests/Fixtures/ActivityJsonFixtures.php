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
 * JSON encoded activity fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityJsonFixtures extends JsonFixtures
{
    /**
     * Loads an activity.
     *
     * @return string
     */
    public static function getActivity()
    {
        return static::load('activity');
    }
}
