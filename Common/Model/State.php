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
class State implements StateInterface
{
    /**
     * @var ActivityInterface The associated activity
     */
    protected $activity;

    /**
     * @var ActorInterface The associated actor
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
     * {@inheritDoc}
     */
    public function setActivity(ActivityInterface $activity)
    {
        $this->activity = $activity;
    }

    /**
     * {@inheritDoc}
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * {@inheritDoc}
     */
    public function setActor(ActorInterface $actor)
    {
        $this->actor = $actor;
    }

    /**
     * {@inheritDoc}
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * {@inheritDoc}
     */
    public function setRegistrationId($registrationId)
    {
        $this->registrationId = $registrationId;
    }

    /**
     * {@inheritDoc}
     */
    public function getRegistrationId()
    {
        return $this->registrationId;
    }

    /**
     * {@inheritDoc}
     */
    public function setStateId($stateId)
    {
        $this->stateId = $stateId;
    }

    /**
     * {@inheritDoc}
     */
    public function getStateId()
    {
        return $this->stateId;
    }
}
