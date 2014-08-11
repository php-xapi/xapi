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
 * A {@link ProfileInterface Profile} related to an {@link ActivityInterface Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityProfile extends Profile implements ActivityProfileInterface
{
    /**
     * @var ActivityInterface The activity
     */
    private $activity;

    /**
     * {@inheritDoc}
     */
    public function setActivity(ActivityInterface $activity)
    {
        $this->activity = $activity;
    }

    /**
     * {@inheritDoc}
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
