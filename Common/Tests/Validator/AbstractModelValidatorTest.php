<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Validator;

use Symfony\Component\Validator\Validation;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractModelValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Symfony\Component\Validator\Validator
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->addXmlMapping(__DIR__.'/../../metadata/validator/Activity.xml')
            ->addXmlMapping(__DIR__.'/../../metadata/validator/Agent.xml')
            ->addXmlMapping(__DIR__.'/../../metadata/validator/Group.xml')
            ->addXmlMapping(__DIR__.'/../../metadata/validator/Statement.xml')
            ->addXmlMapping(__DIR__.'/../../metadata/validator/StatementReference.xml')
            ->getValidator();
    }

    /**
     * @dataProvider getObjectsToValidate
     */
    public function testValidateObject($object, $violationCount, $groups = array())
    {
        $this->assertEquals($violationCount, $this->validator->validate($object, $groups)->count());
    }

    public abstract function getObjectsToValidate();
}
