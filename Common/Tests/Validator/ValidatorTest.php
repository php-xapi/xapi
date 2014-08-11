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

use Symfony\Component\Validator\ValidatorInterface;
use Xabbuh\XApi\Common\Validator\Validator;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterXApiConstraints()
    {
        $validatorBuilder = $this->getMock('\Symfony\Component\Validator\ValidatorBuilderInterface');
        $validatorBuilder->expects($this->once())
            ->method('addXmlMappings');

        Validator::registerXApiConstraints($validatorBuilder);
    }

    public function testCreateValidatorBuilder()
    {
        $builder = Validator::createValidatorBuilder();

        $this->validateXApiValidator($builder->getValidator());
    }

    public function testCreateValidator()
    {
        $this->validateXApiValidator(Validator::createValidator());
    }

    private function validateXApiValidator(ValidatorInterface $validator)
    {
        $metadataFactory = $validator->getMetadataFactory();

        $this->assertTrue(
            $metadataFactory->hasMetadataFor('\Xabbuh\XApi\Model\Activity')
        );
        $this->assertTrue(
            $metadataFactory->hasMetadataFor('\Xabbuh\XApi\Model\Agent')
        );
        $this->assertTrue(
            $metadataFactory->hasMetadataFor('\Xabbuh\XApi\Model\Activity')
        );
        $this->assertTrue(
            $metadataFactory->hasMetadataFor('\Xabbuh\XApi\Model\Activity')
        );
    }
}
