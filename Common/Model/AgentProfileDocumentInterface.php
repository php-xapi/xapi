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
 * A {@link DocumentInterface Document} that is related to an {@link AgentInterface Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface AgentProfileDocumentInterface extends DocumentInterface
{
    /**
     * Sets the agent profile.
     *
     * @param AgentProfileInterface $profile The agent profile
     */
    public function setAgentProfile(AgentProfileInterface $profile);

    /**
     * Returns the agent profile.
     *
     * @return AgentProfileInterface The agent profile
     */
    public function getAgentProfile();
}
