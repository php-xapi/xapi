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
 * A {@link Document} that is related to an {@link Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityProfileDocument extends Document
{
    /**
     * @var ActivityProfile The activity profile
     */
    private $profile;

    /**
     * Sets the {@link ActivityProfile activity profile}.
     *
     * @param ActivityProfile $profile The activity profile
     */
    public function setActivityProfile(ActivityProfile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Returns the {@link ActivityProfile activity profile}.
     *
     * @return ActivityProfile The activity profile
     */
    public function getActivityProfile()
    {
        return $this->profile;
    }
}
