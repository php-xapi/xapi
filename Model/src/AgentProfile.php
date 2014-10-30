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
 * A {@link Profile} related to an {@link Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AgentProfile extends Profile
{
    /**
     * @var Agent The agent
     */
    private $agent;

    /**
     * Sets the agent.
     *
     * @param Agent $agent The agent
     */
    public function setAgent(Agent $agent)
    {
        $this->agent = $agent;
    }

    /**
     * Returns the agent.
     *
     * @return Agent The agent
     */
    public function getAgent()
    {
        return $this->agent;
    }
}
