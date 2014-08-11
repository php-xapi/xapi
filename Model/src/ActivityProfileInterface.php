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
interface ActivityProfileInterface extends ProfileInterface
{
    /**
     * Sets the activity.
     *
     * @param ActivityInterface $activity The activity
     */
    public function setActivity(ActivityInterface $activity);

    /**
     * Returns the activity.
     *
     * @return ActivityInterface The activity
     */
    public function getActivity();
}
