<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model\Tests;

use Xabbuh\XApi\Model\Verb;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class VerbTest extends \PHPUnit_Framework_TestCase
{
    public function testIsVoidVerb()
    {
        $verb = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));

        $this->assertTrue($verb->isVoidVerb());
    }

    public function testIsVoidVerbWithoutVoidVerb()
    {
        $verb = new Verb(
            'http://www.adlnet.gov/XAPIprofile/ran(travelled_a_distance)',
            array('en-US' => 'ran', 'es' => 'corrió')
        );

        $this->assertFalse($verb->isVoidVerb());
    }

    public function testVerbsEqualWhenTheirPropertiesAreEqual()
    {
        $verb1 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));
        $verb2 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));

        $this->assertTrue($verb1->equals($verb2));
    }

    public function testVerbsDoNotEqualWhenIdsDiffer()
    {
        $verb1 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));
        $verb2 = new Verb('http://adlnet.gov/expapi/verbs/void', array('en-US' => 'voided'));

        $this->assertFalse($verb1->equals($verb2));
    }

    public function testVerbsDoNotEqualWhenNumberOfDisplaysDiffers()
    {
        $verb1 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));
        $verb2 = new Verb('http://adlnet.gov/expapi/verbs/voided', array());

        $this->assertFalse($verb1->equals($verb2));
    }

    public function testVerbsDoNotEqualWhenDisplayLanguagesDiffer()
    {
        $verb1 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));
        $verb2 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-GB' => 'voided'));

        $this->assertFalse($verb1->equals($verb2));
    }

    public function testVerbsDoNotEqualWhenDisplayValuesDiffer()
    {
        $verb1 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'voided'));
        $verb2 = new Verb('http://adlnet.gov/expapi/verbs/voided', array('en-US' => 'void'));

        $this->assertFalse($verb1->equals($verb2));
    }

    public function testCreateVoidVerb()
    {
        $this->assertEquals('http://adlnet.gov/expapi/verbs/voided', Verb::createVoidVerb()->getId());
    }
}
