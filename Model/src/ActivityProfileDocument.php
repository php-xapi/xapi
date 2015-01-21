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
final class ActivityProfileDocument extends Document
{
    /**
     * @var ActivityProfile The activity profile
     */
    private $profile;

    public function __construct(array $data = array(), ActivityProfile $profile = null)
    {
        parent::__construct($data);

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
