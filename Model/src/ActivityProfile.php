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
 * A {@link Profile} related to an {@link Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityProfile extends Profile
{
    /**
     * @var Activity The activity
     */
    private $activity;

    /**
     * Sets the {@link Activity}.
     *
     * @param Activity $activity The activity
     */
    public function setActivity(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Returns the {@link Activity}.
     *
     * @return Activity The activity
     */
    public function getActivity()
    {
        return $this->activity;
    }
}
