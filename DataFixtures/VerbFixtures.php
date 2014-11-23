<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\DataFixtures;

use Xabbuh\XApi\Model\Verb;

/**
 * {@link Verb} fixtures
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class VerbFixtures
{
    public static function getVerb()
    {
        return new Verb('http://adlnet.gov/expapi/verbs/created', array(
            'en-US' => 'created',
        ));
    }

    public static function getTravelledVerb()
    {
        return new Verb('http://www.adlnet.gov/XAPIprofile/ran(travelled_a_distance)', array(
            'en-US' => 'ran',
            'es' => 'corrió',
            'de' => 'rannte',
        ));
    }
}
