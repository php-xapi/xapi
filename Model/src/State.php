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
 * An activity provider's state stored on a remote LRS.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class State
{
    /**
     * @var Activity The associated activity
     */
    protected $activity;

    /**
     * @var Actor The associated actor
     */
    protected $actor;

    /**
     * @var string An optional registration id
     */
    protected $registrationId;

    /**
     * @var string The state id
     */
    protected $stateId;

    /**
     * Sets the activity.
     *
     * @param Activity $activity The activity
     */
    public function setActivity(Activity $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Returns the activity.
     *
     * @return Activity The activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Sets the actor.
     *
     * @param Actor $actor The actor
     */
    public function setActor(Actor $actor)
    {
        $this->actor = $actor;
    }

    /**
     * Returns the actor.
     *
     * @return Actor The actor
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Sets the optional registration id.
     *
     * @param string $registrationId The registration id
     */
    public function setRegistrationId($registrationId)
    {
        $this->registrationId = $registrationId;
    }

    /**
     * Returns the registration id.
     *
     * @return string The registration id
     */
    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    /**
     * Sets the state's id.
     *
     * @param string $stateId The id
     */
    public function setStateId($stateId)
    {
        $this->stateId = $stateId;
    }

    /**
     * Returns the state's id.
     *
     * @return string The id
     */
    public function getStateId()
    {
        return $this->stateId;
    }
}
