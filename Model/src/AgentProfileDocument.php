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
 * A {@link Document} that is related to an {@link Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
final class AgentProfileDocument extends Document
{
    /**
     * @var AgentProfile The agent profile
     */
    private $profile;

    public function __construct(AgentProfile $profile, DocumentData $data)
    {
        parent::__construct($data);

        $this->profile = $profile;
    }

    /**
     * Returns the agent profile.
     *
     * @return AgentProfile The agent profile
     */
    public function getAgentProfile()
    {
        return $this->profile;
    }
}
