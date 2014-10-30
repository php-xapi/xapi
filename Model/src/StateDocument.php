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
 * A document associated to an activity provider state.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StateDocument extends Document
{
    /**
     * @var State The state the document is associated to
     */
    protected $state;

    /**
     * Sets the document's {@link State}.
     *
     * @param State $state The state
     */
    public function setState(State $state)
    {
        $this->state = $state;
    }

    /**
     * Returns the document's {@link State}.
     *
     * @return State The state
     */
    public function getState()
    {
        return $this->state;
    }
}
