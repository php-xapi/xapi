<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Serializer\Event;

use Xabbuh\XApi\Common\Serializer\Event\ObjectEventSubscriber;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ObjectEventSubscriberTest extends AddDataSubscriberTest
{
    protected function setUp()
    {
        $this->eventSubscriber = new ObjectEventSubscriber();
    }

    public function getEventData()
    {
        return array(
            array(
                array('name' => 'Xabbuh\XApi\Common\Model\Object'),
                array(
                    'id' => 'http://www.example.co.uk/exampleactivity',
                    'definition' => array(
                        'name' => array(
                            'en-GB' => 'example activity',
                            'en-US' => 'example activity',
                        ),
                        'description' => array(
                            'en-GB' => 'An example of an activity',
                            'en-US' => 'An example of an activity',
                        ),
                        'type' => 'http://www.example.co.uk/types/exampleactivitytype',
                    ),
                ),
                array(
                    'id' => 'http://www.example.co.uk/exampleactivity',
                    'definition' => array(
                        'name' => array(
                            'en-GB' => 'example activity',
                            'en-US' => 'example activity',
                        ),
                        'description' => array(
                            'en-GB' => 'An example of an activity',
                            'en-US' => 'An example of an activity',
                        ),
                        'type' => 'http://www.example.co.uk/types/exampleactivitytype',
                    ),
                    'objectType' => 'Activity',
                ),
            ),
            array(
                array('name' => 'Xabbuh\XApi\Common\Model\Object'),
                array(
                    'name' => 'Example Group',
                    'account' => array(
                        'homePage' => 'http://example.com/homePage',
                        'name' => 'GroupAccount',
                    ),
                    'member' => array(),
                    'objectType' => 'Group',
                ),
                array(
                    'name' => 'Example Group',
                    'account' => array(
                        'homePage' => 'http://example.com/homePage',
                        'name' => 'GroupAccount',
                    ),
                    'member' => array(),
                    'objectType' => 'Group',
                ),
            ),
            array(
                array('name' => 'Xabbuh\XApi\Common\Model\Actor'),
                array(
                    'name' => 'Christian',
                    'mbox' => 'mailto:christian@example.com',
                ),
                array(
                    'name' => 'Christian',
                    'mbox' => 'mailto:christian@example.com',
                ),
            ),
        );
    }
}
