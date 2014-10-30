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
 * A group of {@link Agent Agents} of a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Group extends Actor
{
    /**
     * @var Agent[] The members of the Group
     */
    protected $members = array();

    /**
     * Adds a member to this group.
     *
     * @param Agent $agent The member to add
     */
    public function addMember(Agent $agent)
    {
        $this->members[] = $agent;
    }

    /**
     * Removes a member.
     *
     * @param Agent $agent The member to remove
     */
    public function removeMember(Agent $agent)
    {
        $index = array_search($agent, $this->members, true);

        if (false !== $index) {
            unset($this->members[$index]);
        }
    }

    /**
     * Sets the members of this group.
     *
     * @param Agent[] $members The members
     */
    public function setMembers(array $members)
    {
        $this->members = $members;
    }

    /**
     * Returns the members of this group.
     *
     * @return Agent[] The members
     */
    public function getMembers()
    {
        return $this->members;
    }
}
