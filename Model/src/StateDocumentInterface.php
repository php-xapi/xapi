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
interface StateDocumentInterface extends DocumentInterface
{
    /**
     * Sets the document's state.
     *
     * @param StateInterface $state The state
     */
    public function setState(StateInterface $state);

    /**
     * Returns the document's state.
     *
     * @return StateInterface The state
     */
    public function getState();
}
