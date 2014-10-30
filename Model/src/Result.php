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
 * An {@link Actor Actor's} outcome related to the {@link Statement} in which
 * it is included.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Result
{
    /**
     * @var Score The score
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
     * Sets the score the user achieved.
     *
     * @param Score $score The score
     */
    public function setScore(Score $score)
    {
        $this->score = $score;
    }

    /**
     * Returns the user's score.
     *
     * @return Score The score
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Sets whether or not the user finished a task successfully.
     *
     * @param boolean $success True if the user finished an exercise successfully,
     *                         false otherwise
     */
    public function setSuccess($success)
    {
        $this->success = $success;
    }

    /**
     * Returns whether or not the user finished a task successfully.
     *
     * @return boolean True if the user finished an exercise successfully,
     *                 false otherwise
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Sets the completion status.
     *
     * @param boolean $completion True, if the Activity was completed, false
     *                            otherwise
     */
    public function setCompletion($completion)
    {
        $this->completion = $completion;
    }

    /**
     * Returns the completion status.
     *
     * @return boolean $completion True, if the Activity was completed, false
     *                             otherwise
     */
    public function getCompletion()
    {
        return $this->completion;
    }

    /**
     * Sets a response for the given activity.
     *
     * @param string $response The response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * Returns the response.
     *
     * @return string The response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Sets the period of time over which the Activity was performed.
     *
     * @param string $duration The duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * Returns the period of time over which the Activity was performed.
     *
     * @return string The duration
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
