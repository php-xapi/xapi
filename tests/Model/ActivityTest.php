<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Tests\Model;

use Xabbuh\XApiCommon\Model\Activity;
use Xabbuh\XApiCommon\Model\Definition;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApiCommon\Model\Activity $activity */
        $activity = $this->deserialize($this->loadFixture('activity'));

        $this->assertEquals(
            'http://www.example.co.uk/exampleactivity',
            $activity->getId()
        );
        $this->assertEquals(
            array(
                'en-GB' => 'example activity',
                'en-US' => 'example activity',
            ),
            $activity->getDefinition()->getName()
        );
        $this->assertEquals(
            array(
                'en-GB' => 'An example of an activity',
                'en-US' => 'An example of an activity',
            ),
            $activity->getDefinition()->getDescription()
        );
        $this->assertEquals(
            'http://www.example.co.uk/types/exampleactivitytype',
            $activity->getDefinition()->getType()
        );
    }

    public function testSerialize()
    {
        $activity = new Activity();
        $activity->setId('http://www.example.co.uk/exampleactivity');

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
        $activity->setDefinition($definition);

        $this->serializeAndValidateData(
            $this->loadFixture('activity'),
            $activity
        );
    }
}
