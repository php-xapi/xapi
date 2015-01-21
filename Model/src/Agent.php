<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model;

/**
 * An individual Agent of an xAPI {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
final class Agent extends Actor
{
    /**
     * {@inheritdoc}
     */
    public function equals(Actor $actor)
    {
        if (!parent::equals($actor)) {
            return false;
        }

        if ('Xabbuh\XApi\Model\Agent' !== get_class($actor)) {
            return false;
        }

        return true;
    }
}
