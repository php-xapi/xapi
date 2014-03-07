<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * A group of {@link Agent Agents} of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Group extends Actor implements GroupInterface
{
    /**
     * The members of the Group
     * @var AgentInterface[]
     */
    protected $members = array();

    /**
     * {@inheritDoc}
     */
    public function addMember(AgentInterface $agent)
    {
        $this->members[] = $agent;
    }

    /**
     * {@inheritDoc}
     */
    public function removeMember(AgentInterface $agent)
    {
        $index = array_search($agent, $this->members, true);

        if (false !== $index) {
            unset($this->members[$index]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function setMembers(array $members)
    {
        $this->members = $members;
    }

    /**
     * {@inheritDoc}
     */
    public function getMembers()
    {
        return $this->members;
    }
}
