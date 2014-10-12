<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Validator;

use Symfony\Component\Validator\ValidatorBuilder;
use Symfony\Component\Validator\ValidatorBuilderInterface;
use Symfony\Component\Validator\ValidatorInterface;

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
            __DIR__.'/../metadata/Activity.xml',
            __DIR__.'/../metadata/Agent.xml',
            __DIR__.'/../metadata/Group.xml',
            __DIR__.'/../metadata/Statement.xml',
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
     * @return ValidatorInterface The Validator
     */
    public static function createValidator()
    {
        return static::createValidatorBuilder()->getValidator();
    }
}
