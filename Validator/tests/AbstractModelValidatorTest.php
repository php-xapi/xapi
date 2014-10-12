<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Validator\Tests;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractModelValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Validator
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = Validation::createValidatorBuilder()
            ->addXmlMapping(__DIR__.'/../metadata/Activity.xml')
            ->addXmlMapping(__DIR__.'/../metadata/Agent.xml')
            ->addXmlMapping(__DIR__.'/../metadata/Group.xml')
            ->addXmlMapping(__DIR__.'/../metadata/Statement.xml')
            ->addXmlMapping(__DIR__.'/../metadata/StatementReference.xml')
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
