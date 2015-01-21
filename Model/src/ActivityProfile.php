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
final class ActivityProfile extends Profile
{
    /**
     * @var Activity The activity
     */
    private $activity;

    /**
     * @param string   $profileId
     * @param Activity $activity
     */
    public function __construct($profileId, Activity $activity)
    {
        parent::__construct($profileId);

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
