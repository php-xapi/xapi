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
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        $validatorBuilder = Validation::createValidatorBuilder();

        $errorReporting = error_reporting();
        error_reporting($errorReporting & ~E_USER_DEPRECATED);

        if (method_exists($validatorBuilder, 'setApiVersion')) {
            $validatorBuilder->setApiVersion(Validation::API_VERSION_2_5);
        }

        error_reporting($errorReporting);

        $this->validator = $validatorBuilder
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
        if (0 === count($groups)) {
            $groups = null;
        }

        if ($this->validator instanceof ValidatorInterface) {
            $this->assertEquals($violationCount, $this->validator->validate($object, null, $groups)->count());
        } else {
            $this->assertEquals($violationCount, $this->validator->validate($object, $groups)->count());
        }
    }

    public abstract function getObjectsToValidate();
}
