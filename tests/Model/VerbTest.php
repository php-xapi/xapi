<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class VerbTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApi\Common\Model\Verb $verb */
        $verb = $this->deserialize($this->loadFixture('verb'));

        $this->assertEquals(
            'http://www.adlnet.gov/XAPIprofile/ran(travelled_a_distance)',
            $verb->getId()
        );
        $this->assertEquals(
            array('en-US' => 'ran', 'es' => 'corrió'),
            $verb->getDisplay()
        );
    }

    public function testSerialize()
    {
        $verb = new Verb();
        $verb->setId('http://www.adlnet.gov/XAPIprofile/ran(travelled_a_distance)');
        $verb->setDisplay(array('en-US' => 'ran', 'es' => 'corrió'));

        $this->serializeAndValidateData($this->loadFixture('verb'), $verb);
    }
}
