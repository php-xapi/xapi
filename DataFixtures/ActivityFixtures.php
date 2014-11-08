<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Activity;
use Xabbuh\XApi\Model\Definition;

/**
 * Activity fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityFixtures
{
    /**
     * Loads an activity.
     *
     * @return Activity
     */
    public static function getActivity()
    {
        $description = array(
            'en-GB' => 'An example of an activity',
            'en-US' => 'An example of an activity',
        );
        $name = array(
            'en-GB' => 'example activity',
            'en-US' => 'example activity',
        );
        $definition = new Definition($name, $description, 'http://www.example.co.uk/types/exampleactivitytype');

        return new Activity('http://www.example.co.uk/exampleactivity', $definition);
    }
}
