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
 * An {@link ActorInterface Actor's} outcome related to the
 * {@link StatementInterface Statement} in which it is included.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Result implements ResultInterface
{
    /**
     * @var ScoreInterface The score
     */
    protected $score;

    /**
     * @var boolean Indicates whether or not the attempt was successful
     */
    protected $success;

    /**
     * @var boolean Indicates whether or not the Activity was completed
     */
    protected $completion;

    /**
     * @var string A response for the given Activity
     */
    protected $response;

    /**
     * @var string Period of time over which the Activity was performed
     */
    protected $duration;

    /**
     * {@inheritDoc}
     */
    public function setScore(ScoreInterface $score)
    {
        $this->score = $score;
    }

    /**
     * {@inheritDoc}
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * {@inheritDoc}
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * {@inheritDoc}
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * {@inheritDoc}
     */
    public function setCompletion($completion)
    {
        $this->completion = $completion;
    }

    /**
     * {@inheritDoc}
     */
    public function getCompletion()
    {
        return $this->completion;
    }

    /**
     * {@inheritDoc}
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritDoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * {@inheritDoc}
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * {@inheritDoc}
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
