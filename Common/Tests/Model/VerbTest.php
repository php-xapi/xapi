<?php

/*
 * This file is part of the xAPI package.
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
    public function testIsVoidVerb()
    {
        $verb = new Verb();
        $verb->setId('http://adlnet.gov/expapi/verbs/voided');
        $verb->setDisplay(array('en-US' => 'voided'));

        $this->assertTrue($verb->isVoidVerb());
    }

    public function testIsVoidVerbWithoutVoidVerb()
    {
        $verb = new Verb();
        $verb->setId('http://www.adlnet.gov/XAPIprofile/ran(travelled_a_distance)');
        $verb->setDisplay(array('en-US' => 'ran', 'es' => 'corrió'));

        $this->assertFalse($verb->isVoidVerb());
    }

    public function testCreateVoidVerb()
    {
        $this->assertEquals('http://adlnet.gov/expapi/verbs/voided', Verb::createVoidVerb()->getId());
    }
}
