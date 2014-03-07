<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Validator;

use Symfony\Component\Validator\ValidatorBuilder;
use Symfony\Component\Validator\ValidatorBuilderInterface;

/**
 * Entry point to setup the {@link \Symfony\Component\Validator\Validator}
 * component for the Experience API.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Validator
{
    /**
     * Registers validation constraints for the xAPI models on a ValidatorBuilder.
     *
     * @param ValidatorBuilderInterface $builder The ValidatorBuilder
     */
    public static function registerXApiConstraints(ValidatorBuilderInterface $builder)
    {
        $builder->addXmlMappings(array(
            __DIR__.'/../../metadata/validator/Activity.xml',
            __DIR__.'/../../metadata/validator/Agent.xml',
            __DIR__.'/../../metadata/validator/Group.xml',
            __DIR__.'/../../metadata/validator/Statement.xml'
        ));
    }

    /**
     * Creates a ValidationBuilder with validation constraints registered for
     * the xAPI models.
     *
     * @return ValidatorBuilderInterface The ValidatorBuilder
     */
    public static function createValidatorBuilder()
    {
        $builder = new ValidatorBuilder();
        static::registerXApiConstraints($builder);

        return $builder;
    }

    /**
     * Creates a new Validator.
     *
     * @return \Symfony\Component\Validator\ValidatorInterface The Validator
     */
    public static function createValidator()
    {
        return static::createValidatorBuilder()->getValidator();
    }
}
