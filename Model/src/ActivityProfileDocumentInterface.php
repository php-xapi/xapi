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
 * A {@link DocumentInterface Document} that is related to an {@link ActivityInterface Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface ActivityProfileDocumentInterface extends DocumentInterface
{
    /**
     * Sets the activity profile.
     *
     * @param ActivityProfileInterface $profile The activity profile
     */
    public function setActivityProfile(ActivityProfileInterface $profile);

    /**
     * Returns the activity profile.
     *
     * @return ActivityProfileInterface The activity profile
     */
    public function getActivityProfile();
}
