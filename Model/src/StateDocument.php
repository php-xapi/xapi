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
class StateDocument extends Document implements StateDocumentInterface
{
    /**
     * @var StateInterface The state the document is associated to
     */
    protected $state;

    /**
     * {@inheritDoc}
     */
    public function setState(StateInterface $state)
    {
        $this->state = $state;
    }

    /**
     * {@inheritDoc}
     */
    public function getState()
    {
        return $this->state;
    }
}
