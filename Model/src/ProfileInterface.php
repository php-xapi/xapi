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
 * A {@link DocumentInterface Document} related to a profile.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface ProfileInterface
{
    /**
     * Sets the profile id.
     *
     * @param string $profileId The id
     */
    public function setProfileId($profileId);

    /**
     * Returns the profile id.
     *
     * @return string The id
     */
    public function getProfileId();
}
