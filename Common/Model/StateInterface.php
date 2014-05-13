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
 * An activity provider's state stored on a remote LRS.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StateInterface
{
    /**
     * Sets the activity.
     *
     * @param ActivityInterface $activity The activity
     */
    public function setActivity(ActivityInterface $activity);

    /**
     * Returns the activity.
     *
     * @return ActivityInterface The activity
     */
    public function getActivity();

    /**
     * Sets the actor.
     *
     * @param ActorInterface $actor The actor
     */
    public function setActor(ActorInterface $actor);

    /**
     * Returns the actor.
     *
     * @return ActorInterface The actor
     */
    public function getActor();

    /**
     * Sets the optional registration id.
     *
     * @param string $registrationId The registration id
     */
    public function setRegistrationId($registrationId);

    /**
     * Returns the registration id.
     *
     * @return string The registration id
     */
    public function getRegistrationId();

    /**
     * Sets the state's id.
     *
     * @param string $stateId The id
     */
    public function setStateId($stateId);

    /**
     * Returns the state's id.
     *
     * @return string The id
     */
    public function getStateId();
}
