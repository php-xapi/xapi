<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * A {@link DocumentInterface Document} that is related to an {@link ActivityInterface Activity}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ActivityProfileDocument extends Document implements ActivityProfileDocumentInterface
{
    /**
     * @var ActivityProfileInterface The activity profile
     */
    private $profile;

    /**
     * {@inheritDoc}
     */
    public function setActivityProfile(ActivityProfileInterface $profile)
    {
        $this->profile = $profile;
    }

    /**
     * {@inheritDoc}
     */
    public function getActivityProfile()
    {
        return $this->profile;
    }
}
