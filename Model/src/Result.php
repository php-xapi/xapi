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
     * @param Score       $score
     * @param bool        $success
     * @param bool        $completion
     * @param string|null $response
     * @param string|null $duration
     */
    public function __construct(Score $score, $success, $completion, $response = null, $duration = null)
    {
        $this->score = $score;
        $this->success = $success;
        $this->completion = $completion;
        $this->response = $response;
        $this->duration = $duration;
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
     * Returns the response.
     *
     * @return string The response
     */
    public function getResponse()
    {
        return $this->response;
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
