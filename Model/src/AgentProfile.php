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
 * A {@link ProfileInterface Profile} related to an {@link AgentInterface Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class AgentProfile extends Profile implements AgentProfileInterface
{
    /**
     * @var AgentInterface The agent
     */
    private $agent;

    /**
     * {@inheritDoc}
     */
    public function setAgent(AgentInterface $agent)
    {
        $this->agent = $agent;
    }

    /**
     * {@inheritDoc}
     */
    public function getAgent()
    {
        return $this->agent;
    }
}
