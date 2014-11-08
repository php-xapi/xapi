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
 * A profile.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class Profile
{
    /**
     * @var string The profile id
     */
    protected $profileId;

    /**
     * @param string $profileId The id
     */
    public function __construct($profileId)
    {
        $this->profileId = $profileId;
    }

    /**
     * Returns the profile id.
     *
     * @return string The id
     */
    public function getProfileId()
    {
        return $this->profileId;
    }
}
