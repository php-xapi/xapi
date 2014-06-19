<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Test\Fixture;

use Xabbuh\XApi\Common\Model\Activity;
use Xabbuh\XApi\Common\Model\Definition;

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
     * @return \Xabbuh\XApi\Common\Model\ActivityInterface
     */
    public static function getActivity()
    {
        $definition = new Definition();
        $definition->setName(array(
            'en-GB' => 'example activity',
            'en-US' => 'example activity',
        ));
        $definition->setDescription(array(
            'en-GB' => 'An example of an activity',
            'en-US' => 'An example of an activity',
        ));
        $definition->setType('http://www.example.co.uk/types/exampleactivitytype');
        $activity = new Activity();
        $activity->setId('http://www.example.co.uk/exampleactivity');
        $activity->setDefinition($definition);

        return $activity;
    }
}
